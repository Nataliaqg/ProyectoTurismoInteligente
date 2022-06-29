<?php

namespace App\Http\Livewire\Admin\Hotel;

use App\Models\Hotel;
use Livewire\Component;

class MostrarHotel extends Component
{

    public $hotel; //nose esta usando

    public function render()
    {
        //$hoteles = Hotel::where('ciudad_id',9)->get(); // para mostras los hoteles  solo de Santa Cruz
        $hoteles = Hotel::all();
        //$hoteles=Hotel::where('ciudad_id','1')->get();
        return view('livewire.admin.hotel.mostrar-hotel',compact('hoteles'));
    }
}
