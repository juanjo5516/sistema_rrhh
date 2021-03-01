<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    //$role = Role::create(['name' => 'Administrador']);
    //$permission = Permission::create(['name' => 'Modulo Desglose Salarios']);
    //$permission = Permission::create(['name' => 'Modulo Personal']);
    //$permission = Permission::create(['name' => 'Modulo Listados']);

    $role = Role::where('name','Administrador')->first();
    //$role = Role::find(1);
    dd($role);
    $role->givePermissionTo('Modulo Desglose Salarios');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/personal', 'personal.listadopersonas');
Route::view('/registro-personal', 'personal.registropersonas');
Route::view('/personal-historico', 'personal.historico');

Route::resource('persona', 'PersonaController');

Route::resource('colegiados', 'ColegiadoController');
Route::view('/list-colegiados', 'colegiado.listadocolegiado');

Route::view('/ingreso', 'catalogo.ingreso');
Route::view('/egreso', 'catalogo.egreso');

Route::view('/asignacion', 'catalogo.asignacion');

Route::resource('rol', 'RolController');

Route::get('/obtener-catalogo', 'ObtenerCatalogoController@obtenerCatalogo');

Route::view('/tablero-renglon', 'tableros.renglones');
