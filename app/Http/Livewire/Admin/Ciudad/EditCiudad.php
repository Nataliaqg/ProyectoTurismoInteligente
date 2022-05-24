<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Ciudad;
use Illuminate\Support\Str;

class EditCiudad extends Component
{
    public $ciudad; 

    
    protected $rules =[
        'ciudad.nombre' => 'required',
        'ciudad.abreviatura'=>'required'
    ];

    protected $listeners=['delete'];

    public function mount(Ciudad $ciudad){ //captura lo que se envia desde la url
        $this->ciudad=$ciudad;
    }

    public function refreshCiudad(){
        $this->ciudad=$this->ciudad->fresh();
    }

    public function save(){
        $rules=$this->rules;

       $this->validate($rules);
       
       $this->ciudad->save();
       $bitacora = new Bitacora();
       $bitacora->crear('ciudad editada :' .$this->ciudad->nombre);
       $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.ciudad.edit-ciudad')->layout('layouts.admin');
    }
}
