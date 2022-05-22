<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->integer('precio');
            $table->unsignedBigInteger('transportes_id');
            $table->foreign('transportes_id')->references('id')->on('transportes');
            $table->unsignedBigInteger('ciudadOrigen_id');
            $table->foreign('ciudadOrigen_id')->references('id')->on('ciudads');
            $table->unsignedBigInteger('ciudadDestino_id');
            $table->foreign('ciudadDestino_id')->references('id')->on('ciudads');
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
        Schema::dropIfExists('viajes');
    }
}
