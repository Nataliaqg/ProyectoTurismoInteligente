<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Hotel;
use App\Models\LugarTuristico;
use App\Models\Restaurante;
use App\Models\TransportePrivado;
use App\Models\Viaje;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open= false;

    public function updatedSearch($value){
        if($value){
            $this->open=true;
        }else{
            $this->open=false;
        }
    }

    public function render()
    {
        //$tipoServicio= Categoria::where('nombre', 'LIKE',"%" . $this->search . "%")->get(); //trae el nombre de mi servicio
        if($this->search){
            $tipoServicio= Categoria::where('nombre','LIKE',"%". $this->search ."%")->get(); 
        }else{
            $tipoServicio=[];
        }
       
          /*  $servicio1= LugarTuristico::all();
        
            $servicio2= Hotel::all();
        
            $servicio3= Restaurante::all();
        
            $servicio4= Viaje::all();
      
            $servicio5= TransportePrivado::all();*/
       
        return view('livewire.search',compact('tipoServicio'));
    }
}
