<?php

namespace App\Http\Livewire\Admin\Lugar;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LugarTuristico;

class ShowLugarTuristico extends Component


{
    use WithPagination;
    public $search;   
    public $lugarturistico;
    protected $listeners = ['delete'];

     //para que cuando busque valla a la paginacion correcta 
    
    public function updatingSearch(){
        $this->resetPage();
    }
    public function mount(){
        $this->getLugarturisticos();
    }
    // para refresacr la inforamcion de los lugares
    public function getLugarturisticos(){
        $this->lugarturistico = LugarTuristico::all();
    }

    public function delete(LugarTuristico $lugarturistico){
        $lugarturistico->delete();
        $this->getLugarturisticos();
    }    

    public function render()
    {
        $lugarturisticos = LugarTuristico::where('nombre','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.lugar.show-lugar-turistico', compact('lugarturisticos'))->layout('layouts.admin');
    }
}
