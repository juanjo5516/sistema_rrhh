<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/personal', 'personal.listadopersonas');
Route::view('/registro-personal', 'personal.registropersonas');

Route::resource('persona', 'PersonaController');
Route::resource('colegiados', 'ColegiadoController');
Route::view('/list-colegiados', 'colegiado.listadocolegiado');

Route::view('/ingreso', 'catalogo.ingreso');
Route::view('/egreso', 'catalogo.egreso');

Route::view('/asignacion', 'catalogo.asignacion');

Route::resource('rol', 'RolController');

Route::get('/obtener-catalogo', 'ObtenerCatalogoController@obtenerCatalogo');

Route::view('/tablero-renglon', 'tableros.renglones');
