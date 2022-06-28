<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;

class CategoriaServicios extends Component
{
    public $categoria;
    public $lugarTuristicos=[]; //llena todos los srvicios correspondiente a esa categoria (puede que cambie)
    public $viajes=[];
    public $restaurantes=[];
    public $hotels=[];
    public $transportePrivados=[];

    public function loadPosts(){
        $this->lugarTuristicos= $this->categoria->LugarTuristicos;
        $this->viajes=$this->categoria->Viajes;
        $this->restaurantes=$this->categoria->Restaurantes;
        $this->hotels=$this->categoria->Hoteles;
        $this->transportePrivados=$this->categoria->TransportePrivados;
        $this->emit('glider',$this->categoria->id);
    }
    
    public function render()
    {
        return view('livewire.cliente.categoria-servicios');
    }
}
