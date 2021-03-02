<?php

use Illuminate\Database\Seeder;
use App\UnidadEjecutora;

class UnidadEjecutoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        UnidadEjecutora::create(['numero'=>'101','unidad_ejecutora'=>'Actividades Centrales']);
        UnidadEjecutora::create(['numero'=>'102','unidad_ejecutora'=>'Registro Mercantil de la República']);
        UnidadEjecutora::create(['numero'=>'103','unidad_ejecutora'=>'Registro de la Propiedad Intelectual']);
        UnidadEjecutora::create(['numero'=>'104','unidad_ejecutora'=>'Dirección del Sistema Nacional de Calidad']);
        UnidadEjecutora::create(['numero'=>'105','unidad_ejecutora'=>'Dirección de Servicios Financieros y Técnicos Empresariales
        ']);
        UnidadEjecutora::create(['numero'=>'106','unidad_ejecutora'=>'Dirección de Atención y Asistencia al Consumidor']);
        UnidadEjecutora::create(['numero'=>'107','unidad_ejecutora'=>'Programa de Apoyo al Comercio Exterior y la Integración']);
        UnidadEjecutora::create(['numero'=>'108','unidad_ejecutora'=>'Programa Nacional de la Competitividad']);
        
       
    }
}
