<?php

namespace App\Http\Controllers;

use App\Colegiado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColegiadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Colegiado::find(1)->persona,200);


        
        //return view('user.index', ['users' => $users]); 

        return $users = DB::table('colegiados')
                            ->join('personas','colegiados.id','personas.colegiado_id')
                            ->select('colegiados.*','personas.*')
                            ->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colegiado  $colegiado
     * @return \Illuminate\Http\Response
     */
    public function show(Colegiado $colegiado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colegiado  $colegiado
     * @return \Illuminate\Http\Response
     */
    public function edit(Colegiado $colegiado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colegiado  $colegiado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colegiado $colegiado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colegiado  $colegiado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colegiado $colegiado)
    {
        //
    }
}
