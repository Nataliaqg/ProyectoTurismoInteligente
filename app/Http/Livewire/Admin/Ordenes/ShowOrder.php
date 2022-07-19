<?php

namespace App\Http\Livewire\Admin\Ordenes;

use App\Models\Order;
use Livewire\Component;

class ShowOrder extends Component
{
    public $order,$order_id;
    public function mount(Order $order){
        $this->order= $order;
        $this->order_id=$order->id;
    }

    public function render()
    {
        $order= Order::where('id','$order_id');
        return view('livewire.admin.ordenes.show-order',compact('order'))->layout('layouts.admin');
    }
}
