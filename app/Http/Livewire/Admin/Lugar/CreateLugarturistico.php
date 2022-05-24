<?php

namespace App\Http\Livewire\Admin\Lugar;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\LugarTuristico;
use App\Models\Ciudad;

class CreateLugarturistico extends Component
{
    public $ciudads;
    public $ciudad_id="";
    public $nombre, $descripcion, $precio, $direccion, $horaEntrada, $horaSalida;
   
    //validaciones
    protected $rules =[
        'ciudad_id' => 'required',
        'nombre' =>'required',
        'descripcion' =>'required',
        'direccion' =>'required',
        'precio' =>'required', 
        'horaEntrada' =>'nullable',       
    ];


    public function mount(){
        $this->ciudads = Ciudad::all();
    }
    //propiedades computadas 
    public function getCiudadProperty(){
        return Ciudad::find($this->ciudad_id);

    }
    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $lugarturistico = new LugarTuristico();
        $lugarturistico->nombre = $this->nombre;
        $lugarturistico->descripcion = $this->descripcion;
        $lugarturistico->precio = $this->precio;
        $lugarturistico->direccion = $this->direccion;
        $lugarturistico->horaEntrada = $this->horaEntrada;
        $lugarturistico->horaSalida = $this->horaSalida;
        $lugarturistico->ciudad_id =$this->ciudad_id;

        $lugarturistico->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Lugar Turistico  Creado: ' .$lugarturistico->nombre);            
        $this->emit('saved');
        
    }

    /*public function getListaProductos(){
        $this->lugarturistico = LugarTuristico::where('lugar', $this->category->id)->get();
    }*/
    public function render()
    {
        return view('livewire.admin.lugar.create-lugarturistico')->layout('layouts.admin');
    }
}
