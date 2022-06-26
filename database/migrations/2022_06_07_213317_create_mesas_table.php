<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('capacidad_mesa');
            $table->integer('cantidad_mesas');
            $table->float('precio');
            $table->timestamps();
            $table->unsignedBigInteger('restaurante_id');
            $table->foreign('restaurante_id')->references('id')->on('restaurantes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesas');
    }
}
