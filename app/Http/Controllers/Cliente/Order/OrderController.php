<?php

namespace App\Http\Controllers\Cliente\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function show(Order $order){
        $items= json_decode($order->content); //convierte el contenido  que estaba en formato json
        return view('cliente.orders.show',compact('order','items'));
    }

    public function payment(Order $order){ //YA NO OCUPAMOS ESTE METODO Y TAMPOCO SU VISTA ADJUNTA
        $items= json_decode($order->content); //convierte el contenido  que estaba en formato json
        return view('cliente.orders.payment',compact('order','items'));
    }
}
