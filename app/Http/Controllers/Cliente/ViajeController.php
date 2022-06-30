<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeController extends Controller
{   
    
    public function show(Viaje $viaje){
        return view('cliente.viajes.show',compact('viaje'));
    }
}
