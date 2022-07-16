<?php

namespace App\Http\Livewire\Cliente\SCart;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners=['render'];

    public function destroy(){
        Cart::destroy(); //elimina todos los items dek carrito

        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.cliente.s-cart.shopping-cart');
    }
}
