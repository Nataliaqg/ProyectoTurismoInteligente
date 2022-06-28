<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\LugarTuristico;
use Illuminate\Http\Request;

class LugarTuristicoController extends Controller
{
    public function show(LugarTuristico $lugarTuristico){
        return view('cliente.lugaresTuristicos.show',compact('lugarTuristico'));
    }
}
