<?php

namespace App\Http\Controllers;

use App\Mail\MensajeCreacion;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personal.listadopersonas');
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
        
        $persona = new Persona();
        $persona->dpi = $request->dpi;
        $persona->nombre1 = $request->nombre1;
        $persona->nombre2 = $request->nombre2;
        $persona->nombre3 = $request->nombre3;
        $persona->apellido1 = $request->apellido1;
        $persona->apellido2 = $request->apellido2;
        $persona->apellido_casada = $request->apellido_casada;
        $persona->renglon = $request->renglon;
        $persona->genero = $request->genero;
        $persona->etnia_id = $request->etnia;
        $persona->comunidadlinguistica_id = $request->comunidad;

        $persona->save();

        //Para enviar correo

        Mail::to('jjaguilal@mineco.gob.gt')->queue(new MensajeCreacion);


        return response()->json('Persona creada',200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
