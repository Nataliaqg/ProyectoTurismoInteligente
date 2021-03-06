<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); //el usuario que la generó
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('contact'); //formulario resumen

            $table->string('carnet');

            $table->integer('phone'); 
            
            $table->string('email');

            $table->enum('status',[Order::PENDIENTE,Order::RECIBIDO,Order::CONFIRMADO,Order::ANULADO])->default(Order::PENDIENTE);

            $table->double('total');

            $table->json('content'); //almacena todos los items guardados en el carrito de compra
            
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
        Schema::dropIfExists('orders');
    }
}
