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
            $table->unsignedBigInteger('tipoTransPrivado_id');
            $table->integer('precio');
            $table->integer('capacidadPersonas');
            $table->foreign('tipoTransPrivado_id')->references('id')->on('tipo_trans_privados');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
