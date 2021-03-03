<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
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

    //ROLES*********************************
    //$role = Role::create(['name' => 'Administrador']);
    //$role = Role::create(['name' => 'Visor']);
    //**********************************************************

    //PERMISOS*********************************************************
    //$permission = Permission::create(['name' => 'Modulo Desglose Salarios']);
    //$permission = Permission::create(['name' => 'Modulo Personal']);
    //$permission = Permission::create(['name' => 'Modulo Listados']);
    //***************************************************************
    

    //**************************************************************
    //Asignar Role a un USUARIO
    /* $user = User::where('name','Administrador')->first();
    $user->assignRole('Administrador');  */
    //**************************************************************

    //**************************************************************
    //Asignar PERMISOS a un ROL
    //$role = Role::where('name','Administrador')->first();
    //$role->givePermissionTo(['Modulo Desglose Salarios','Modulo Personal','Modulo Listados']); 
    //**************************************************************

    //dd($role);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/personal', 'personal.listadopersonas');
Route::view('/registro-personal', 'personal.registropersonas');
Route::view('/personal-historico', 'personal.historico');

Route::resource('persona', 'PersonaController');
Route::resource('historico', 'HistorialController');

Route::resource('colegiados', 'ColegiadoController');
Route::view('/list-colegiados', 'colegiado.listadocolegiado');

Route::view('/ingreso', 'catalogo.ingreso');
Route::view('/egreso', 'catalogo.egreso');

Route::view('/asignacion', 'catalogo.asignacion');

Route::resource('rol', 'RolController');

Route::get('/obtener-catalogo', 'ObtenerCatalogoController@obtenerCatalogo');

Route::view('/tablero-renglon', 'tableros.renglones');
