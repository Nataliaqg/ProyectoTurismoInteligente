<?php

namespace App\Http\Livewire\Admin\Restaurante;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Restaurante;

class ShowRestaurante extends Component
{

    use WithPagination;
    public $search;
    public $restaurante;
    protected $listeners = ['delete2'=>'delete'];
//para que cuando busque, se dirija a la paginacion correcta 
    public function updatingSearch(){
        $this->resetPage();

    }
    public function delete($restaurante){
        $idnombre = Restaurante::find($restaurante);
        $idnombre->delete();
        $bitacora = new Bitacora();
        $bitacora->crear('Restaurante Eliminado');    
    }
    public function render()

    {
        $restaurantes =Restaurante::where('nombre','like','%'.$this->search.'%')->paginate(10); 
        return view('livewire.admin.restaurante.show-restaurante',compact('restaurantes'))->layout('layouts.admin');
        
    }
}
