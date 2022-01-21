<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('equipo');
            $table->date('entrada');
            $table->string('encargado');
            $table->string('celular');
            $table->text('problema');
            $table->text('causa');
            $table->text('solucion');
            $table->text('observacion');
            $table->integer('estado');
            $table->string('persona')->nullable();
            $table->string('DNI')->nullable();
            $table->datetime('salida')->nullable();
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
        Schema::dropIfExists('mantenimientos');
    }
}
