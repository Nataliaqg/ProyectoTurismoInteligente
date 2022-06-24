<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); //ver cmo verificar que es de el
            $table->unsignedBigInteger('ciudadOrigen_id');
            $table->unsignedBigInteger('ciudadDestino_id');
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->integer('cantidadPersonas');
            $table->integer('montoTotal')->nullable(); //nullable porque esto se crea al principio
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ciudadOrigen_id')->references('id')->on('ciudads');
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
        Schema::dropIfExists('servicios');
    }
}
