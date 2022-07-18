<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Order $order){ //funcion que recibe la info del usuario que quiere acceder y que order
        if($order->user_id == $user->id){ //si el usuario que esta iniciado sesion es el mismo que creo esa orden especifica
            return true; 
        }else{
            return false;
        }
    }

    public function payment(User $user, Order $order){ //PARA QUE NO VUELVA A ENTRAR A LA VISTA DE PAGO, SI YA SE HA PAGADO ESA ORDER
        if($order->status ==2){ //SI YA SE HA RECIBIDO ESA ORDEN 
            return false;
        }else{
            return true;
        }
    }
}
