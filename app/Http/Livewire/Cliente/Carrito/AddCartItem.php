<?php

namespace App\Http\Livewire\Cliente\Carrito;

use Livewire\Component;

class AddCartItem extends Component
{   
    public $lugarTuristico,$precio;
    public $qty=1; 

    public function mount(){
        $this->precio=$this->lugarTuristico->precio;
    }
    public function decrement(){
        $this->qty=$this->qty-1;
    }

    public function increment(){
        $this->qty=$this->qty+1;
    }

    public function render()
    {
        return view('livewire.cliente.carrito.add-cart-item');
    }
}
