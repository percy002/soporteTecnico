<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('equipo');
            $table->string('tipo')->nullable();
            $table->string('patrimonio');
            $table->integer('responsable')->nullable();

            //modificacion de los caracteristicas de un equipo
            $table->string('marca')->nullable();
            $table->string('sistema')->nullable();
            $table->string('procesador')->nullable();
            $table->string('placa')->nullable();
            $table->string('socket')->nullable();
            $table->integer('ram')->nullable();
            $table->string('disco')->nullable();
            $table->integer('video')->nullable();
            $table->string('red')->nullable();
            $table->string('bateria')->nullable();
            $table->string('lectora')->nullable();
            $table->string('tamaño')->nullable();
            $table->string('estado')->default("OPERATIVO");
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
        Schema::dropIfExists('equipos');
    }
}
