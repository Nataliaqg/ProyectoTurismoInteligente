<?php

namespace App\Http\Livewire\Admin\Viaje;

use Livewire\Component;
use App\Models\Viaje;
use App\Models\Ciudad;
use App\Models\Transporte;
use Livewire\WithPagination;
use App\Models\Bitacora;

class ShowViaje extends Component
{
    use WithPagination;
    public $search;
    public $viaje, $ciudadOrigen,$ciudadDestino,$transportes;

    protected $listeners = ['delete'];
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete($viaje){
        $idviaje = Viaje::find($viaje);
        $idviaje->delete();
        $bitacora = new Bitacora();
        $bitacora->crear('Viaje Eliminado'); 
    }

    public function mount (Viaje $viaje){
        $this->viaje= $viaje;
        $this->transportes=Transporte::all();
    }


    public function render()
    {
        $viajes = Viaje::all();
        return view('livewire.admin.viaje.show-viaje',compact('viajes'))->layout('layouts.admin');
    }
}
