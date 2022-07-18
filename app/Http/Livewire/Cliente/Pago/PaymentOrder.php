<?php

namespace App\Http\Livewire\Cliente\Pago;

use App\Models\Order;
use Livewire\Component;

class PaymentOrder extends Component
{

    public $order;

    protected $listeners=['payOrder'];

    public function mount(Order $order){
        $this->order=$order;
    }

    public function payOrder(){
        $this->order->status = 2; //RECIBIDO

        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $items= json_decode($this->order->content); //convierte el contenido  que estaba en formato json
        return view('livewire.cliente.pago.payment-order',compact('items'));
    }
}
