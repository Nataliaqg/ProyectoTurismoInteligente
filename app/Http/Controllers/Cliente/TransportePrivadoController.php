<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\TransportePrivado;
use Illuminate\Http\Request;

class TransportePrivadoController extends Controller
{
    public function show(TransportePrivado $transportePrivado){
        return view('cliente.transportePrivados.show',compact('transportePrivado'));
    }
}
