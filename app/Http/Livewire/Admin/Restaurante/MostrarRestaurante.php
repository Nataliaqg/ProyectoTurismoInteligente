<?php

namespace App\Http\Livewire\Admin\Restaurante;

use App\Models\Restaurante;
use Livewire\Component;

class MostrarRestaurante extends Component
{

     public function render()
    {
        $restaurantes = Restaurante::all();
   
        return view('livewire.admin.restaurante.mostrar-restaurante',compact('restaurantes'));
    }
}
