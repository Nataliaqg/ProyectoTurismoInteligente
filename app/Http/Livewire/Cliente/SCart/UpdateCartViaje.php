<?php

namespace App\Http\Livewire\Cliente\SCart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartViaje extends Component
{
    public $rowId, $qty, $quantity, $categoria_id;

    public function mount(){
        $item= Cart::get($this->rowId);
        $this->categoria_id= $item->options['categoria_id']; //estoy trayendo la cantidad que ya habia seleccionado
        $this->qty= $item->qty;

        $this->quantity=qty_available($item->id,$this->categoria_id); //almacena cant disponible actualizada
    }

    public function decrement(){
        $this->qty=$this->qty-1;

        Cart::update($this->rowId,$this->qty);

        $this->emit('render');
    }

    public function increment(){
        $this->qty=$this->qty+1;

        Cart::update($this->rowId,$this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.cliente.s-cart.update-cart-viaje');
    }
}
