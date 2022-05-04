<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCiudad extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    
    
    public function render()
    {
        
        $ciudades=Ciudad::where('nombre','like','%' . $this->search . '%')->paginate(3); //filtra de acuerdo al nombre

        return view('livewire.admin.ciudad.show-ciudad',compact('ciudades'))->layout('layouts.admin');
    }
}
