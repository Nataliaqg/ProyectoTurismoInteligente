<?php

namespace App\Http\Livewire\Admin\Lugar;


use Livewire\Component;
use App\Models\Ciudad;
use App\Models\LugarTuristico;

class EditLugarturistico extends Component
{
    public $lugarturistico, $ciudads;
    public $ciudad_id;

    protected $rules =[
        'ciudad_id' => 'required',
        'lugarturistico.nombre' =>'required',
        'lugarturistico.descripcion' =>'required',
        'lugarturistico.direccion' =>'required',
        'lugarturistico.precio' =>'required', 
        'lugarturistico.horaEntrada' =>'nullable',
        'lugarturistico.horaSalida' =>'nullable',
        
    ];

    public function mount(LugarTuristico $lugarturistico){
        $this->lugarturistico = $lugarturistico;
        $this->ciudads = Ciudad::all();
        //$this->ciudad_id = $lugarturistico->ciudad->id;

    }
    // no se para que es esto 
    public function getCiudadProperty(){
        return Ciudad::find($this->lugarturistico->ciudad_id);
    }
    public function save(){
        $rules = $this->rules;       

        $this->validate($rules);
        $this->lugarturistico->save();
        //emitir une evento o escuchar
        $this->emit('saved');

    }
    public function render()
    {
        return view('livewire.admin.lugar.edit-lugarturistico')->layout('layouts.admin');
    }
}
