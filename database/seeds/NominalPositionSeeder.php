<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\NominalPosition;

class NominalPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        NominalPosition::create(['puesto' => 'Asesor Profesional Especializado I']);
        NominalPosition::create(['puesto' => 'Asesor Profesional Especializado I, 4 horas']);
        NominalPosition::create(['puesto' => 'Asesor Profesional Especializado II']);
        NominalPosition::create(['puesto' => 'Asesor Profesional Especializado III']);
        NominalPosition::create(['puesto' => 'Asesor Profesional Especializado IV']);
        NominalPosition::create(['puesto' => 'Asistente Profesional I']);
        NominalPosition::create(['puesto' => 'Asistente Profesional II']);
        NominalPosition::create(['puesto' => 'Asistente Profesional III']);
        NominalPosition::create(['puesto' => 'Asistente Profesional Jefe']);
        NominalPosition::create(['puesto' => 'Consejero OMC I']);
        NominalPosition::create(['puesto' => 'Consejero OMC II']);
        NominalPosition::create(['puesto' => 'Director Ejecutivo IV']);
        NominalPosition::create(['puesto' => 'Director General OMC']);
        NominalPosition::create(['puesto' => 'Director Técnico III']);
        NominalPosition::create(['puesto' => 'Jefe Técnico II']);
        NominalPosition::create(['puesto' => 'Ministro']);
        NominalPosition::create(['puesto' => 'Profesional I']);
        NominalPosition::create(['puesto' => 'Profesional II']);
        NominalPosition::create(['puesto' => 'Profesional III']);
        NominalPosition::create(['puesto' => 'Profesional Jefe III']);
        NominalPosition::create(['puesto' => 'Registrador']);
        NominalPosition::create(['puesto' => 'Secretario Ejecutivo II']);
        NominalPosition::create(['puesto' => 'Secretario Ejecutivo III']);
        NominalPosition::create(['puesto' => 'Secretario Ejecutivo IV']);
        NominalPosition::create(['puesto' => 'Secretario Ejecutivo V']);
        NominalPosition::create(['puesto' => 'Secretario General']);
        NominalPosition::create(['puesto' => 'Secretario General OMC']);
        NominalPosition::create(['puesto' => 'Subdirector Ejecutivo I']);
        NominalPosition::create(['puesto' => 'Subdirector Ejecutivo III']);
        NominalPosition::create(['puesto' => 'Subdirector Técnico III']);
        NominalPosition::create(['puesto' => 'Subregistrador']);
        NominalPosition::create(['puesto' => 'Técnico I']);
        NominalPosition::create(['puesto' => 'Técnico II']);
        NominalPosition::create(['puesto' => 'Técnico III']);
        NominalPosition::create(['puesto' => 'Técnico Profesional en Informática I']);
        NominalPosition::create(['puesto' => 'Técnico Profesional en Informática II']);
        NominalPosition::create(['puesto' => 'Técnico Profesional en Informática III']);
        NominalPosition::create(['puesto' => 'Técnico Profesional en Informática IV']);
        NominalPosition::create(['puesto' => 'Técnico Profesional I']);
        NominalPosition::create(['puesto' => 'Técnico Profesional II']);
        NominalPosition::create(['puesto' => 'Técnico Profesional III']);
        NominalPosition::create(['puesto' => 'Trabajador Operativo II']);
        NominalPosition::create(['puesto' => 'Trabajador Operativo III']);
        NominalPosition::create(['puesto' => 'Trabajador Operativo IV']);
        NominalPosition::create(['puesto' => 'Viceministro']);
    }
}
