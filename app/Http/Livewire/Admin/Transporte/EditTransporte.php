<?php

namespace App\Http\Livewire\Admin\Transporte;

use App\Models\Agencia;
use App\Models\TipoAgencia;
use App\Models\Transporte;
use Livewire\Component;

class EditTransporte extends Component
{

    
    public $transporte,$agencias,$tipoAgencias;

    public $agencias_id,$tipoAgencia_id;
    
    public $descripcion,$capacidadMaximaAsientos;

    public $nombre,$tipo;

    public $listeners =['save'];

    protected $rules =[
        'transporte.agencias_id' => 'required',
        'transporte.tipoAgencia_id' => 'required',
        'transporte.modelo' => 'required',
        'transporte.descripcion' => 'required',
        'transporte.capacidadMaximaAsientos' => 'required'
    ];


    //Capturar datos que se envian desde la URL
    public function mount(Transporte $transporte){
        $this->transporte = $transporte;
        $this->agencias = Agencia::all();
        $this->tipoAgencias = TipoAgencia::all();
        //$this->agencias_id = $transporte->agencia->id;

    }

    //propiedades computadas 
   /*  public function getAgenciaProperty(){
        return Agencia::find($this->agencia_id);

    } */

    public function save(Transporte $transporte){
        $rules = $this->rules;
        $this->validate($rules);

        //$transporte = new Transporte();
        /* $this->$transporte->tipoTransporte = $this->tipoTransporte;
        $this->$transporte->descripcion = $this->descripcion;
        $this->$transporte->capacidadMaximaAsientos = $this->capacidadMaximaAsientos;
        $this->$transporte->agencias_id =$this->agencias_id; */

        $this->transporte->save();
        $this->emit('saved');
        return redirect()->route('admin.transportes.show');
    }


    public function render()
    {
        return view('livewire.admin.transporte.edit-transporte')->layout('layouts.admin');
    }
}

