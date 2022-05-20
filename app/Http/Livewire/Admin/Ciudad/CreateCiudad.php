<?php

namespace App\Http\Livewire\Admin\Ciudad;

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

        return redirect()->route('ciudad.show');
    }

  
    public function render()
    {
        return view('livewire.admin.ciudad.create-ciudad')->layout('layouts.admin');
    }
}
