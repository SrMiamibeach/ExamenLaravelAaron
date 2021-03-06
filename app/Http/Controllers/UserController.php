<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class UserController extends Controller
{
    public function index(){

        $rol = auth()->user()->rol;
        if($rol == "admin"){
            $flights = Flight::all();
            return view('administracion', ['flights' => $flights]);
        }else{
            return redirect()->back();
        }
        
    }
}
