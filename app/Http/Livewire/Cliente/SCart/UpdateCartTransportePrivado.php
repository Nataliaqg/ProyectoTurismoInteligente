<?php

namespace App\Http\Livewire\Cliente\SCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartTransportePrivado extends Component
{    
    public $rowId,$quantity,$categoria_id;

    public function mount(){
        $item= Cart::get($this->rowId); //obtiene el id del item de lt
        $this->categoria_id= $item->options['categoria_id'];        
        $this->qty= $item->qty; //traemos la cant que ya habiamos seleccionado

        $this->quantity=qty_available($item->id,$this->categoria_id,); //almacena cant disponible actualizada
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
        return view('livewire.cliente.s-cart.update-cart-transporte-privado');
    }
}
