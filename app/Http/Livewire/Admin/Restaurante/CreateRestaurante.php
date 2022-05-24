<?php

namespace App\Http\Livewire\Admin\Restaurante;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Restaurante;
use App\Models\Ciudad;

class CreateRestaurante extends Component
{
    public $ciudads;
    public $ciudad_id = ""; //i don't know
    public $nombre, $descripcion, $direccion, $horaCierre, $horaApertura, $telefono ,$numeromaxmesas;

    protected $rules = [
        'ciudad_id' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'numeromaxmesas' => 'required',
        'horaCierre' => 'nullable',
        'horaApertura' => 'nullable',
    ];

    public function mount()
    {
        $this->ciudads = ciudad::all();
    }
    //propiedades computadas
    public function getCiudadProperty()
    {
        return Ciudad::find($this->ciudad_id);
    }
    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);
        $restaurante = new Restaurante();
        $restaurante->nombre = $this->nombre;
        $restaurante->descripcion = $this->descripcion;
        $restaurante->telefono = $this->telefono;
        $restaurante->direccion = $this->direccion;
        $restaurante->horaCierre = $this->horaCierre;
        $restaurante->horaApertura = $this->horaApertura;
        $restaurante->capacidadMaximaMesa = $this->numeromaxmesas;
        $restaurante->ciudad_id = $this->ciudad_id; //////////////////
        $restaurante->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Restaurante Creado: ' .$restaurante->nombre);    
        $this->emit('saved');
        //return redirect()->route()

    }
    public function render()
    {
        return view('livewire.admin.restaurante.create-restaurante')->layout('layouts.admin');
    }
}
