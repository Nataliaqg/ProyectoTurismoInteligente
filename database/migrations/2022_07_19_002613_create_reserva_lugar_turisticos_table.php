<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaLugarTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_lugar_turisticos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();      
            $table->integer('cantidad');

            $table->unsignedBigInteger('lugar_id');
            $table->foreign('lugar_id')->references('id')->on('lugar_turisticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_lugar_turisticos');
    }
}
