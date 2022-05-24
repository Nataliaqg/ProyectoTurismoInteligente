<?php

namespace App\Http\Livewire\Admin\Viaje;

use Livewire\Component;
use App\Models\Viaje;
use App\Models\Transporte;
use App\Models\Ciudad;
use App\Models\Bitacora;

class EditViaje extends Component
{
    public $viaje;
    public $transportes;
    public $transporte_id;
    public $transporte_tipoTransporte;
    public $ciudads;
    public $ciudadOrigen_id,$ciudadDestino_id;

    protected $rules = [
        'viaje.fecha' =>'required',
        'viaje.hora' => 'required',
        'viaje.precio' => 'required',
        'viaje.transporte_id' => 'nullable',
        'viaje.ciudadOrigen_id'=>'nullable',
        'viaje.ciudadDestino_id'=>'nullable'
    ]; 

    protected $listeners = ['refreshViaje'];

    public function mount(Viaje $viaje)
    {
        $this->viaje = $viaje;
        $transporte=Transporte::find($viaje->transporte_id);
        $this->transporte_tipoTransporte=$transporte->tipoTransporte;
        $this->transportes = Transporte::all();

        $ciudadOrigen=Ciudad::find($viaje->ciudadOrigen_id);
        $this->ciudadOrigen_id=$ciudadOrigen->nombre;
        $this->ciudads=Ciudad::all(); //ver

        $ciudadDestino=Ciudad::find($viaje->ciudadDestino_id);
        $this->ciudadOrigen_id=$ciudadDestino->nombre;
        $this->ciudads=Ciudad::all(); //ver
    }

    public  function refreshHotel(){
        $this->viaje=$this->viaje->fresh();
    } 

    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);
        $this->viaje->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Hotel Editado'); 
        $this->emit('saved');
    }


    public function render()
    {
        
        return view('livewire.admin.viaje.edit-viaje')->layout('layouts.admin');
    }
}
