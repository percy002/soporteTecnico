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
            $table->unsignedBigInteger('responsable_equipo_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('fecha_entrada');
            $table->text('problema')->nullable();
            $table->text('causa')->nullable();
            $table->text('solucion')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('estado')->default(0);
            $table->string('entregado')->default('No entregado');
            $table->datetime('fecha_entrega')->nullable();
            
            
            $table->timestamps();
            
            // $table->foreign('equipo_id')->references('id')->on('equipos');
        });

        Schema::table('mantenimientos', function($table) {
            $table->foreign('responsable_equipo_id')->references('id')->on('responsable_equipos');
            $table->foreign('user_id')->references('id')->on('users');
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
