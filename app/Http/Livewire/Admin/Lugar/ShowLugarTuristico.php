<?php

namespace App\Http\Livewire\Admin\Lugar;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LugarTuristico;

class ShowLugarTuristico extends Component


{
    use WithPagination;
    public $search;   
    public $lugarturistico;
   
    protected $listeners = ['delete2'=>'delete'];

     //para que cuando busque valla a la paginacion correcta 
    
    public function updatingSearch(){
        $this->resetPage();
    }
  
    // para refrescar la inforamcion de los lugares
    
    public function delete($lugarturistico){
      
         $idnombre = LugarTuristico::find($lugarturistico);        
        $idnombre->delete();     
        $bitacora = new Bitacora();
        $bitacora->crear('Lugar Turistico Eliminado');    

    }

   /* public function delete(LugarTuristico $lugarturistico){
        $lugarturistico->delete();
     
    }  */  

    public function render()
    {
        $lugarturisticos = LugarTuristico::where('nombre','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.lugar.show-lugar-turistico', compact('lugarturisticos'))->layout('layouts.admin');
    }
}
