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
            ->orderBy('periodo_inicio','desc')
            ->leftjoin('nominal_positions','historials.nominal_position_id','=','nominal_positions.id')
            ->leftjoin('administrative_ubications','historials.administrative_ubication_id','=','administrative_ubications.id')
            ->leftjoin('physical_locations','historials.physical_location_id','=','physical_locations.id')
            ->leftjoin('unidad_ejecutoras','historials.unidad_ejecutora_id','=','unidad_ejecutoras.id')
            ->select('historials.id as idHistorial','historials.*','nominal_positions.*','administrative_ubications.ubicacion_administrativa','physical_locations.ubicacion_fisica','unidad_ejecutoras.unidad_ejecutora')
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
        $historial->nominal_position_id=$request->puesto_nominal;
        $historial->puesto_funcional=$request->puesto_funcional;
        $historial->tipo_servicio=$request->tipo_servicio;
        $historial->administrative_ubication_id=$request->ub_admin;
        $historial->physical_location_id=$request->ub_fisica;
        $historial->unidad_ejecutora_id=$request->unidad_ejecutora;
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
        return response()->json(DB::table('historials')
            ->leftjoin('nominal_positions','historials.nominal_position_id','=','nominal_positions.id')
            ->leftjoin('administrative_ubications','historials.administrative_ubication_id','=','administrative_ubications.id')
            ->leftjoin('physical_locations','historials.physical_location_id','=','physical_locations.id')
            ->leftjoin('unidad_ejecutoras','historials.unidad_ejecutora_id','=','unidad_ejecutoras.id')
            ->select('historials.id as idHistorial','historials.*','nominal_positions.*','administrative_ubications.ubicacion_administrativa','physical_locations.ubicacion_fisica','unidad_ejecutoras.unidad_ejecutora')
            ->where('historials.id',$id)
            ->first(),200);    
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
        Historial::find($request->idHistorial)->update($request->all());
        return response()->json("Actualizado Correctamente",200);


        
        //return $request->data['idHistorial'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Historial::findOrFail($id)->delete();
        return response()->json('Histórico Eliminado',200);
    }
}
