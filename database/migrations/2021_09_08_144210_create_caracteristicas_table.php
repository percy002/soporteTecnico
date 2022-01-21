<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->id();
            $table->string('patrimonio');
            $table->integer('responsable')->nullable();
            $table->integer('marca');
            $table->string('sistema')->nullable();
            $table->string('procesador')->nullable();
            $table->string('placa')->nullable();
            $table->string('socket')->nullable();
            $table->integer('RAM')->nullable();
            $table->string('disco')->nullable();
            $table->integer('video')->nullable();
            $table->string('red')->nullable();
            $table->integer('bateria')->nullable();
            $table->string('lectora')->nullable();
            $table->string('tipo')->nullable();
            $table->string('tamaño')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('caracteristicas');
    }
}
