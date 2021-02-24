<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = ['renglon','tipo_desglose','desglose'];
}
