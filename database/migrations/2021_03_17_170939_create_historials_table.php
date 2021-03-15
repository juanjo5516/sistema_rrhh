<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->string('renglon',3);
            $table->date('periodo_inicio');
            $table->date('periodo_fin')->nullable();
            $table->unsignedBigInteger('nominal_position_id')->nullable();
            $table->string('puesto_funcional',100)->nullable();
            $table->string('tipo_servicio',100)->nullable();
            $table->unsignedBigInteger('administrative_ubication_id')->nullable();
            $table->unsignedBigInteger('physical_location_id')->nullable();
            $table->unsignedBigInteger('unidad_ejecutora_id')->nullable();
            $table->timestamps();

            $table->foreign('nominal_position_id')->references('id')->on('nominal_positions');
            $table->foreign('administrative_ubication_id')->references('id')->on('administrative_ubications');
            $table->foreign('physical_location_id')->references('id')->on('physical_locations');
            $table->foreign('unidad_ejecutora_id')->references('id')->on('unidad_ejecutoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historials');
    }
}
