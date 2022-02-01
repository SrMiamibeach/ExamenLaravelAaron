<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'enunciado');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\UserController::class,'index'])->name('admin');

Route::get('/asignar', [App\Http\Controllers\FlightsController::class,'index'])->name('flight.asignar');

Route::put('/asignar/store', [App\Http\Controllers\FlightsController::class,'update'])->name('flight.store');

Route::delete('/remove/{id}', [App\Http\Controllers\FlightsController::class,'destroy'])->name('flight.remove');

Route::get('/pending', [App\Http\Controllers\FlightsController::class,'create'])->name('flight.pending');

Route::post('/pending/{id}', [App\Http\Controllers\FlightsController::class,'store'])->name('flight.pending');
