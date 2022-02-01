<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\airplane;
class FlightsController extends Controller
{
    public function index(){
        $flights = Flight::all();
        $airplanes = airplane::all();
        return view('asignar',['flights' => $flights, 'airplanes' => $airplanes]);
    }
    public function store(Request $request){
        $airplane = airplane::find($request->airplanes);
        $flight = Flight::find($request->flights);
        $flight->available_seats = $airplane->seats;
        $airplane->flights()->save($flight);
        return redirect('/asignar');
    }
    public function destroy($id){
        $flight = Flight::find($id);
        $flight->airplane()->delete();
        return redirect('/asignar');
    }
    public function show(){
        $flights = Flight::where('date', '>','2022/02/01')->orderBy('date')->get();
        return view('pending',['flights' => $flights]);
    }
}
