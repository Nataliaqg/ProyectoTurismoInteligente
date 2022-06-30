<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function show(Hotel $hotel){
          return view('cliente.hotel.show', compact('hotel'));
      }
}
