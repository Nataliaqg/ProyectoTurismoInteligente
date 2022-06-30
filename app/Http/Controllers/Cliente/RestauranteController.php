<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function show(Restaurante $restaurante){
        return view('cliente.restaurante.show',compact('restaurante'));
    }
}
