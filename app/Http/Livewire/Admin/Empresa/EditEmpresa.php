<?php

namespace App\Http\Livewire\Admin\Empresa;

use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Informacion;

class EditEmpresa extends Component
{
    public $empresa;

    public $nombre,$ubicacion,$direccion,$email,$telefono;
    public $facebook,$instagram,$whatsapp;

    public $listeners =['save'];

    protected $rules = [
        'empresa.nombre' => 'required',
        'empresa.ubicacion' => 'required',
        'empresa.direccion' => 'required',
        'empresa.email' => 'required',
        'empresa.telefono' => 'required',
        'empresa.facebook' => 'nullable',
        'empresa.instagram' => 'nullable',
        'empresa.whatsapp' => 'nullable',
    ];

    public function mount(){
      $this->empresa = Informacion::where('id',1)->First();
    }

    public function save(){
        $this->validate();
        
        $this->empresa->save();

        $this->emit('saved');
        $bitacora = new Bitacora();
        $bitacora->crear('Datos de la Empresa Actualizados'); 
    }
    public function render()
    {
        return view('livewire.admin.empresa.edit-empresa')->layout('layouts.admin');
    }
}
