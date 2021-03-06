<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ingreso','IngresoController');
Route::resource('egreso','EgresoController');
Route::resource('c-asignacion','AsignacionController');
Route::resource('historial', 'HistorialController');
Route::resource('ubicacion_administrativa', 'AdministrativeUbicationController');
Route::resource('ubicacion_fisica', 'PhysicalLocationController');
Route::resource('unidades_ejecutoras', 'UnidadEjecutoraController');
