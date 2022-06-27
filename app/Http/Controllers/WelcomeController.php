<?php

namespace App\Http\Controllers;


use App\Models\Hotel;
use App\Models\LugarTuristico;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function __invoke()
    {

        $hoteles = Hotel::all();
        $restaurantes = Restaurante::all();
        $lugarturisticos = LugarTuristico::all();

        return view('welcome', compact('hoteles','restaurantes','lugarturisticos'));
    }
}
