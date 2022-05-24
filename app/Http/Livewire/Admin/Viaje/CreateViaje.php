<?php

namespace App\Http\Livewire\Admin\Viaje;

use Livewire\Component;
use App\Models\Viaje;
use App\Models\Ciudad;
use App\Models\Transporte;
use App\Models\Bitacora;

class CreateViaje extends Component
{
    public $ciudadOrigen_id,$ciudadDestino_id;
    public $ciudads;  //VER
    public $transportes;
    public $transporte_id;
    public $fecha,$hora,$precio;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'precio' => 'required',
        'transporte_id' => 'required',
        'ciudadOrigen_id' => 'required',
        'ciudadDestino_id' => 'required',
    ];

    public function mount()
    {
        $this->transportes = Transporte::all();
        $this->ciudads=Ciudad::all();
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $viaje = new Viaje();
        $viaje->fecha= $this->fecha;
        $viaje->hora= $this->hora;
        $viaje->precio= $this->precio;
        $viaje->transporte_id= $this->transporte_id;
        $viaje->ciudadOrigen_id= $this->ciudadOrigen_id;
        $viaje->ciudadDestino_id= $this->ciudadDestino_id;

        $viaje->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Viaje Creado'); 
        $this->emit('saved');
    }
    
    public function render()
    {
        return view('livewire.admin.viaje.create-viaje')->layout('layouts.admin');
    }
}
