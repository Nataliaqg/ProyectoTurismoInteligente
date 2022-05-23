<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Bitacora;
use App\Models\Ciudad;
use Livewire\Component;

use Illuminate\Support\Str;

class CreateCiudad extends Component
{
    public $nombre,$abreviatura; 
    protected $rules =[
        'nombre' => 'required',
        'abreviatura'=>'required'
    ];

    public function save(){
        $rules=$this->rules;
        $this->validate($rules);

        $ciudad= new Ciudad();
        $ciudad->nombre=$this->nombre;
        $ciudad->abreviatura=$this->abreviatura;

        $ciudad->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Nueva Ciudad Creada: ' .$ciudad->nombre);     

        return redirect()->route('admin.ciudad.show');
    }

  
    public function render()
    {
        return view('livewire.admin.ciudad.create-ciudad')->layout('layouts.admin');
    }
}
