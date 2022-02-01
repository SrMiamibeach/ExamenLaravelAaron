<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\airplane;
use App\Models\User;

class FlightsController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        $airplanes = airplane::all();
        return view('asignar', ['flights' => $flights, 'airplanes' => $airplanes]);
    }
    public function update(Request $request)
    {
        $airplane = airplane::find($request->airplanes);
        $flight = Flight::find($request->flights);
        $flight->available_seats = $airplane->seats;
        $airplane->flights()->save($flight);
        return redirect('/asignar');
    }
    public function destroy($id)
    {
        $flight = Flight::find($id);
        $flight->airplane()->delete();
        return redirect('/asignar');
    }
    public function create()
    {
        $flights = Flight::where('date', '>', '2022/02/01')->orderBy('date')->get();
        return view('pending', ['flights' => $flights]);
    }
    public function store(Request $request, $id)
    {
        $nAsientosReservados = $request->reserva;
        $flight = Flight::find($id);
        $avaliable_seats = $flight->available_seats;
        foreach($flight->users as $user){
            if($user->pivot->user_id == auth()->user()->id){
                $flight->available_seats =$avaliable_seats + $user->pivot->num_plazas;
                $flight->save();
                $avaliable_seats = $flight->available_seats;
                $flight->users()->detach(auth()->user()->id);
                $flight->users()->attach(auth()->user()->id, ['num_plazas' => $nAsientosReservados]);
                $flight->available_seats =$avaliable_seats-$nAsientosReservados;
                $flight->save();
                return redirect()->back();
            }
        }
        $flight->users()->attach(auth()->user()->id, ['num_plazas' => $nAsientosReservados]);
        $flight->available_seats =$avaliable_seats-$nAsientosReservados;
        $flight->save();
        return redirect()->back();
        
    }
}
