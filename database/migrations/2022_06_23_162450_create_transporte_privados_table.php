<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportePrivadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_privados', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoVehiculo',['AUTO','MINUBUS']);
            $table->integer('precio');
            $table->integer('capacidadPersonas');
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
        Schema::dropIfExists('transporte_privados');
    }
}
