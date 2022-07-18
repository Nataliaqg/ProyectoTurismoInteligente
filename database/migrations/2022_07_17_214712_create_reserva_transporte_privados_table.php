<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTransportePrivadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_transporte_privados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');          
            $table->unsignedBigInteger('transporte_id');
            $table->foreign('transporte_id')->references('id')->on('transporte_privados');
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
        Schema::dropIfExists('reserva_transporte_privados');
    }
}
