<?php

namespace App\Http\Livewire\Admin\Transporte;

use App\Models\Agencia;
use App\Models\Transporte;
use Livewire\Component;

class CreateTransporte extends Component
{

    
    public $transportes;
    public $agencias;
    public $agencias_id="";
    public $tipoTransporte,$descripcion,$capacidadMaximaAsientos;

    public $nombre,$tipo;

    protected $rules =[
        'agencias_id' => 'required',
        'tipoTransporte' => 'required',
        'descripcion' => 'required',
        'capacidadMaximaAsientos' => 'required'
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
        return redirect()->route('admin.transportes.show');
    }

    public function render()
    {
        return view('livewire.admin.transporte.create-transporte')->layout('layouts.admin');;
    }
}
