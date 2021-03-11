<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = ['persona_id','renglon','periodo_inicio','periodo_fin','nominal_position_id','puesto_funcional','tipo_servicio','administrative_ubication_id','physical_location_id','unidad_ejecutora_id'];
}
