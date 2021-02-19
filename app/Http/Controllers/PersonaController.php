<?php

namespace App\Http\Controllers;

use App\Mail\MensajeCreacion;
use App\Persona;
use App\Contacto;
use App\Puesto;
use App\Colegiado;
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
        // return view('personal.listadopersonas');
        return response()->json(Persona::all(),200);
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

                
        $contacto = new Contacto();
        $contacto->nombre_padre = $request->nombre_padre;
        $contacto->direccion_padre = $request->direccion_padre;
        $contacto->telefono_padre = $request->telefono_padre;
        $contacto->nombre_madre = $request->nombre_madre;
        $contacto->direccion_madre = $request->direccion_madre;
        $contacto->telefono_madre = $request->telefono_madre;
        $contacto->nombre_conyuge = $request->nombre_conyuge;
        $contacto->direccion_conyuge = $request->direccion_conyuge;
        $contacto->telefono_conyuge = $request->telefono_conyuge;
        $contacto->save();
        //return response()->json($contacto,200);

        $puesto = new Puesto();
        $puesto->puesto_funcional= $request->puesto_funcional;
        $puesto->nominal_position_id= $request->nominal_position;
        $puesto->save();

        $colegiado = new Colegiado();
        $colegiado->no_colegiado=$request->no_colegiado;
        $colegiado->fecha_fin_vigencia=$request->fecha_fin_colegiado;
        $colegiado->save();

        
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
        $persona->comunidad_id = $request->comunidad;
        $persona->fecha_nacimiento = $request->fecha_nac;
        $persona->estado_civil = $request->estado_civil;
        $persona->lugar_nacimiento = $request->lugar_nacimiento;
        $persona->nit = $request->nit;
        $persona->sensorial_id = $request->sensorial;
        $persona->motriz_id = $request->motriz;
        $persona->mental_id = $request->mental;
        $persona->contacto_id = $contacto->id;
        $persona->puesto_id = $puesto->id;
        $persona->colegiado_id = $colegiado->id;
        

        $persona->save();

        

        //Para enviar correo

        //Mail::to('jjaguilal@mineco.gob.gt')->queue(new MensajeCreacion);


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
