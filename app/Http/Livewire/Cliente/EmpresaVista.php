<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Informacion;
use Livewire\Component;

class EmpresaVista extends Component
{
    public function render()
    {
        $empresa = Informacion::where('id',1)->First();

        return view('livewire.cliente.empresa-vista', compact('empresa'));
    }
}
