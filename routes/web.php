<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CRUD de vehículos
Route::resource('vehicles', VehicleController::class);