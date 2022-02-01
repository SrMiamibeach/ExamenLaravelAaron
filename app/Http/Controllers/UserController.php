<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class UserController extends Controller
{
    public function index(){
        $flights = Flight::all();
        return view('administracion', ['flights' => $flights]);
    }
}
