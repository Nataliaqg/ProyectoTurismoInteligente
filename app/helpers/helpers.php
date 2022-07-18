<?php

use App\Models\Categoria;
use App\Models\Habitacion;
use App\Models\LugarTuristico;
use App\Models\mesa;
use App\Models\ReservaHabitacion;
use App\Models\ReservaMesa;
use App\Models\Restaurante;
use App\Models\Viaje;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Builder;

//siempre va a existir un id de ese servicio con su id de categoria
function quantity($servicio_id, $categoria_id, $extra = null, $cantreservadas=null)
{ //PARA CALCULAR EL "STOCK" DEL SERVICIO EN ESPECIFICO
    
    if ($categoria_id == 3) { // restaurante
        if ($extra) {
            if ($cantreservadas==0){
                $mesa = mesa::find($extra);
                $quantity = $mesa->cantidad_mesas;
            }else{
                $mesa = mesa::find($extra);
                $quantity = $mesa->cantidad_mesas;
                $quantity = $quantity-$cantreservadas;
            }     
            
        }
    }

    if ($categoria_id == 2) { // restaurante
        if ($extra) {
            if ($cantreservadas==0){
                $habitacion = Habitacion::find($extra);
                $quantity = $habitacion->cantidad;
            }else{
                $habitacion = Habitacion::find($extra);
                $quantity = $habitacion->cantidad;
                $quantity = $quantity-$cantreservadas;
            }     
            
        }
    }



    if ($categoria_id == 1) { //si es un lugar turistico
        $lugarTuristico_id = $servicio_id;
        $lugarTuristico = LugarTuristico::find($lugarTuristico_id);
        $quantity = $lugarTuristico->cantidad;
    }
    if ($categoria_id == 4) {
        $viaje_id = $servicio_id;
        $viaje = Viaje::find($viaje_id); //encuentra que viaje en específico
        $quantity = $viaje->transporte->capacidadMaximaAsientos;
    }
    if ($categoria_id == 5) {
        if($extra){
            $quantity=0;
        }else{
            $quantity=1;
        }
    }
    return $quantity;
}

function qty_added($servicio_id, $categoria_id, $extra=null)
{ //CALCULA CANTIDAD DE ITEMS AGREGADOS DE ESE SERVICIO EN ESPECIFICO

    $cart = Cart::content(); //obtenemos los items agregados en el carrito
    if ($extra && $categoria_id == 3) {
        $item = $cart->where('id', $servicio_id)
            ->where('options.mesa_id', $extra)
            ->where('options.categoria_id', $categoria_id)->first();
    }else if($extra && $categoria_id == 2){
        $item = $cart->where('id', $servicio_id)
            ->where('options.habitacion_id', $extra)
            ->where('options.categoria_id', $categoria_id)->first();
    } else {
        $item = $cart->where('id', $servicio_id)
            ->where('options.categoria_id', $categoria_id)->first(); //ninguno va a tener igual id con igual id de categoria
    }
    



    if ($item) { //si ese servicio ha sido agregado al carrito
        return $item->qty; //retornar cuanto requiere el cliente
    } else {
        return 0;
    }
}

function qty_available($servicio_id, $categoria_id, $extra = null, $cantreservadas = null)
{
    return (quantity($servicio_id, $categoria_id, $extra, $cantreservadas) - qty_added($servicio_id, $categoria_id, $extra));
}