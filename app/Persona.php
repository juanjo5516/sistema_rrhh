<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /* protected $fillable = ['user_id','dpi','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','nit','fecha_nacimiento','lugar_nacimiento',
    'estado_civil','genero','etnia_id','comunidadlinguistica_id','renglon'] */
    protected $fillable = ['nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','genero'];

    public function colegiados()
    {
        return $this->hasMany('App\Colegiado');
    }


}
