<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Order;

class WelcomeController extends Controller
{
    //

    public function __invoke()
    {

        if(auth()->user()){ //muestra si está autentificado
            $pendiente =Order::where('status',1)->where('user_id',auth()->user()->id)->count();
            if($pendiente){
                $mensaje= "Usted tiene $pendiente paquetes pendientes. <a class='font-bold' href='".route('orders.index')."?status=1'>Ir a pagar</a>";
                session()->flash('flash.banner', $mensaje);
            }
        }

        $categorias=Categoria::all();

        return view('welcome', compact('categorias'));
    }
}
