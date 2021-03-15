<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_padre', 50)->nullable();
            $table->string('direccion_padre', 200)->nullable();
            $table->string('telefono_padre', 8)->nullable();
            $table->string('nombre_madre', 50)->nullable();
            $table->string('direccion_madre', 200)->nullable();
            $table->string('telefono_madre', 8)->nullable();
            $table->string('nombre_conyuge', 50)->nullable();
            $table->string('direccion_conyuge', 200)->nullable();
            $table->string('telefono_conyuge', 8)->nullable();
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
        Schema::dropIfExists('contactos');
    }
}
