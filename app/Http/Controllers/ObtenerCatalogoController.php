<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObtenerCatalogoController extends Controller
{
    function obtenerCatalogo(Request $request){
        $catalogos=DB::table($request->table)->select('id',$request->column)->get();
        return response()->json($catalogos,200);
    }
}
