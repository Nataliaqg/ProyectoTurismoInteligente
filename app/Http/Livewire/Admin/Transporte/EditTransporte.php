<?php

namespace App\Http\Livewire\Admin\Transporte;

use App\Models\Agencia;
use App\Models\Transporte;
use Livewire\Component;

class EditTransporte extends Component
{

    
    public $transportes;
    public $agencias;
    public $agencias_id="";
    public $tipoTransporte,$descripcion,$capacidadMaximaAsientos;

    public $nombre,$tipo;

    public $listeners =['save'];

    protected $rules =[
        'transportes.agencias_id' => 'required',
        'transportes.tipoTransporte' => 'required',
        'transportes.descripcion' => 'required',
        'transportes.capacidadMaximaAsientos' => 'required'
    ];

    public function mount(){
        $this->agencias = Agencia::all();
    }

    //propiedades computadas 
    public function getAgenciaProperty(){
        return Agencia::find($this->agencia_id);

    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $transporte = new Transporte();
        $transporte->tipoTransporte = $this->tipoTransporte;
        $transporte->descripcion = $this->descripcion;
        $transporte->capacidadMaximaAsientos = $this->capacidadMaximaAsientos;
        $transporte->agencias_id =$this->agencias_id;

        $transporte->save();
        return redirect()->route('admin.transporte.show');
    }


    public function render()
    {
        return view('livewire.admin.transporte.edit-transporte')->layout('layouts.admin');
    }
}

