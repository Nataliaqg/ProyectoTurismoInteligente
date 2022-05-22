<?php

namespace App\Http\Livewire\Admin\Viaje;

use Livewire\Component;
use App\Models\Viaje;

class ShowViaje extends Component
{
    public function render()
    {
        return view('livewire.admin.viaje.show-viaje')->layout('layouts.admin');
    }
}
