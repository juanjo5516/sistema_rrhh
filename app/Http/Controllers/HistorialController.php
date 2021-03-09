<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->id){
            //return  Historial::where('persona_id',$request->id)->get();
            return DB::table('historials')
            ->leftjoin('nominal_positions','historials.puesto_nominal','=','nominal_positions.id')
            ->select('historials.id as idHistorial','historials.*','nominal_positions.*')
            ->where('persona_id',$request->id)
            ->get();
        }
        return response()->json(Historial::all(),200);
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
        $historial = new Historial();
        $historial->renglon = $request->renglon;
        $historial->persona_id=$request->persona_id;
        $historial->periodo_inicio=$request->periodo_inicio;
        $historial->periodo_fin=$request->periodo_fin;
        $historial->puesto_nominal=$request->puesto_nominal;
        $historial->puesto_funcional=$request->puesto_funcional;
        $historial->tipo_servicio=$request->tipo_servicio;
        $historial->save();
        return response()->json('Historial agregado',200);
                   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show(Historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Historial::find($id);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historial $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historial $historial)
    {
        //
    }
}
