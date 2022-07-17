<?php

namespace App\Http\Livewire\Cliente\Orden;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrden extends Component
{
    public $rules=[
        'contact' =>'required',
        'carnet' => 'required',
        'phone'=> 'required',
        'email'=> 'required'
    ];

    public $contact, $carnet, $phone, $email;

    public function create_order(){
        $rules= $this->rules;

        $this->validate();

        $order= new Order();
        
        $order->user_id= auth()->user()->id; //recupera la info del usuario AUTENTICADO

        $order->contact= $this->contact;  //FORMULARIO

        $order->carnet= $this->carnet;

        $order->phone= $this->phone;

        $order->email= $this->email;

        //status ya tiene por defecto

        $order->total= Cart::subTotal();

        $order->content= Cart::content();

        $order->save(); //cuando se guarda

        Cart::destroy(); //limpio el carrito

        return redirect()->route('orders.payment',$order); 
    }

    public function render()
    {
        return view('livewire.cliente.orden.create-orden');
    }
}
