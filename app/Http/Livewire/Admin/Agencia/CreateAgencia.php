<?php

namespace App\Http\Livewire\Admin\Agencia;

use App\Models\Agencia;
use App\Models\Bitacora;
use Livewire\Component;

class CreateAgencia extends Component
{

    public $agencias;

    public $nombre,$tipo;

    protected $rules =[
        'nombre' => 'required',
        'tipo' => 'required'
    ];


    //Funcion para iniciar alguna propiedad
    public function mount(){
        $this->agencias = Agencia::all();
    }


    public function save(){
        $this->validate();

        $agencia = new Agencia();

        $agencia->nombre = $this->nombre;
        $agencia->tipo = $this->tipo;

        $agencia->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Nueva Agencia Creada: ' .$agencia->nombre);  
        return redirect()->route('admin.agencias.show');

    }

    public function render()
    {
        return view('livewire.admin.agencia.create-agencia')->layout('layouts.admin');
    }
}
