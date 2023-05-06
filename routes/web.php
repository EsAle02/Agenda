<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NotaController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas contactos//
Route::resource('/contactos', ContactoController::class);

//Rutas Eventos//

Route::resource('/eventos', EventoController::class);

Route::resource('/notas', NotaController::class);
