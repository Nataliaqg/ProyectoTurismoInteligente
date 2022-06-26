<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();

            //a borrar tipo transporte
            $table->string('modelo');
            $table->string('descripcion');
            $table->unsignedSmallInteger('capacidadMaximaAsientos');

            $table->unsignedBigInteger('agencias_id');
            $table->foreign('agencias_id')->references('id')->on('agencias')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('tipoAgencia_id')->nullable();
            $table->foreign('tipoAgencia_id')->references('id')->on('tipo_agencias');

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
        Schema::dropIfExists('transportes');
    }
}
