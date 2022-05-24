<?php

namespace App\Http\Livewire\Admin\Hotel;

use App\Models\Bitacora;
use App\Models\Ciudad;
use App\Models\Hotel;
use Livewire\Component;

class CreateHotel extends Component
{
    public $ciudads;
    public $ciudad_id = ""; //i don't know
    public $nombre, $descripcion, $direccion, $categoria, $capacidadMaximaHabitacion, $telefono ;

    protected $rules = [
        'ciudad_id' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'categoria' => 'required',
        'capacidadMaximaHabitacion' => 'required',
        
    ];
    public function mount()
    {
        $this->ciudads = Ciudad::all();
    }
    //propiedades computadas
    public function getCiudadProperty()
    {
        return Ciudad::find($this->ciudad_id);
    }
    public function save(){
        $rules = $this->rules;
        $this->validate($rules);
        $hotel = new Hotel();
        $hotel->nombre = $this->nombre;
        $hotel->descripcion = $this->descripcion;
        $hotel->telefono = $this->telefono;
        $hotel->direccion = $this->direccion;
        $hotel->categoria = $this->categoria;
        $hotel->capacidadMaximaHabitacion = $this->capacidadMaximaHabitacion;
        
        $hotel->ciudad_id = $this->ciudad_id; //////////////////
       
        $hotel->save();
        $bitacora = new Bitacora();
        $bitacora->crear('nuevo Hotel creado: ' . $hotel->nombre);
            
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.hotel.create-hotel')->layout('layouts.admin');
    }
}
