<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //eliminar registro para no repetir identificador
        Cart::erase(auth()->user()->id);
        //nuevo registro
        Cart::store(auth()->user()->id); //cada que cerremos sesion, los items que tengamos en el carrito
                                         //se van a crear en la nueva tabla, asociados al user autenticado
    }
}
