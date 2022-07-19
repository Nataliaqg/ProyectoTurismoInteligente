<?php

namespace App\Http\Livewire\Admin\Ordenes;

use App\Models\Order;
use Livewire\Component;

class OrderController extends Component
{

    public function render()
    {
        $orders=Order::query()->where('status','<>',1);

        if(request('status')){
            $orders->where('status',request('status'));
        }

        $orders= $orders->get();

        $pendiente =Order::where('status',1)->count();
        $recibido = Order::where('status',2)->count();
        $confirmado = Order::where('status',3)->count();
        $anulado = Order::where('status',4)->count();


        return view('livewire.admin.ordenes.order-controller',compact('orders','pendiente','recibido','confirmado','anulado'))->layout('layouts.admin');
    }
}
