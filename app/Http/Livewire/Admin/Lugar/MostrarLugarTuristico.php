<?php

namespace App\Http\Livewire\Admin\Lugar;

use App\Models\LugarTuristico;
use Livewire\Component;

class MostrarLugarTuristico extends Component
{
    public $lugarturistico; //nose esta usando

   
    public function render()
    {
        
        $lugarturisticos = LugarTuristico::all();
      
        return view('livewire.admin.lugar.mostrar-lugar-turistico',compact('lugarturisticos'));
    }
}
