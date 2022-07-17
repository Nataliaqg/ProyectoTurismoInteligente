<?php

use App\Models\Categoria;
use App\Models\LugarTuristico;
use App\Models\mesa;
use App\Models\Restaurante;
use App\Models\Viaje;
use Gloudemans\Shoppingcart\Facades\Cart;

//siempre va a existir un id de ese servicio con su id de categoria
function quantity($servicio_id, $categoria_id, $mesa_id = null)
{ //PARA CALCULAR EL "STOCK" DEL SERVICIO EN ESPECIFICO

    if ($categoria_id == 3) { // restaurante
           if ($mesa_id) {
            $mesa = mesa::find($mesa_id);
            $quantity = $mesa->cantidad_mesas;
        }
    }
    if ($categoria_id == 1) { //si es un lugar turistico
        $lugarTuristico_id = $servicio_id;
        $lugarTuristico = LugarTuristico::find($lugarTuristico_id);
        $quantity = $lugarTuristico->cantidad;
    } 
    if ( $categoria_id ==4){
        $viaje_id = $servicio_id;
        $viaje = Viaje::find($viaje_id); //encuentra que viaje en específico
        $quantity = $viaje->transporte->capacidadMaximaAsientos; 
    }

    return $quantity;
}

function qty_added($servicio_id, $categoria_id,$mesa_id)
{ //CALCULA CANTIDAD DE ITEMS AGREGADOS DE ESE SERVICIO EN ESPECIFICO

    $cart = Cart::content(); //obtenemos los items agregados en el carrito
    if($mesa_id){
        $item = $cart->where('id', $servicio_id)
        ->where('options.mesa_id', $mesa_id)
        ->where('options.categoria_id', $categoria_id)->first();
    }else{
        $item = $cart->where('id', $servicio_id)
        ->where('options.categoria_id', $categoria_id)->first(); //ninguno va a tener igual id con igual id de categoria
    }
    

    if ($item) { //si ese servicio ha sido agregado al carrito
        return $item->qty; //retornar cuanto requiere el cliente
    } else {
        return 0;
    }
}

function qty_available($servicio_id, $categoria_id, $mesa_id = null)
{
    return (quantity($servicio_id, $categoria_id, $mesa_id) - qty_added($servicio_id, $categoria_id,$mesa_id));
}
