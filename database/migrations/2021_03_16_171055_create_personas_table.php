<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('dpi', 13)->default(2275180390101);
            $table->string('nombre1', 50)->default('Nombre1');
            $table->string('nombre2', 50)->default('Nombre2');
            $table->string('nombre3', 50)->nullable();
            $table->string('apellido1', 50)->default('apellido1');
            $table->string('apellido2', 50)->default('apellido2');
            $table->string('apellido_casada', 50)->nullable();
            $table->string('nit', 13)->default('nit');
            $table->date('fecha_nacimiento')->default('2020-01-01');
            $table->string('lugar_nacimiento', 50)->default('lugar_nacimiento');
            $table->string('estado_civil', 1)->default('C');
            $table->string('genero', 1)->nullable();
            $table->bigInteger('no_hijos')->nullable();
            $table->foreignId('etnia_id')->constrained();
            $table->foreignId('comunidad_id')->constrained();
            $table->foreignId('academico_id')->constrained();
            $table->string('renglon', 3)->default('029');
            $table->foreignId('sensorial_id')->constrained();
            $table->foreignId('motriz_id')->constrained();
            $table->foreignId('mental_id')->constrained();
            $table->foreignId('contacto_id')->constrained();
            $table->foreignId('puesto_id')->constrained();
            $table->foreignId('colegiado_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
