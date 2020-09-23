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
            $table->integer('user_id');
            $table->string('dpi', 13);
            $table->string('nombre1', 50);
            $table->string('nombre2', 50);
            $table->string('nombre3', 50);
            $table->string('apellido1', 50);
            $table->string('apellido2', 50);
            $table->string('apellido_casada', 50);
            $table->string('nit', 13);
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 50);
            $table->string('estado_civil', 1);
            $table->string('genero', 1);
            $table->integer('etnia_id');
            $table->integer('comunidadlinguistica_id');
            $table->integer('discapacidad_id');
            $table->string('renglon', 3);
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
