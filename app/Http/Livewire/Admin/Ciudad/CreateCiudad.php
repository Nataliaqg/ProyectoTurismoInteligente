<?php

namespace App\Http\Livewire\Admin\Ciudad;

use App\Models\Ciudad;
use Livewire\Component;

use Illuminate\Support\Str;

class CreateCiudad extends Component
{
    public $nombre, $slug,$abreviatura;
    protected $rules =[
        'nombre' => 'required',
        'slug' => 'required|unique:ciudads',
        'abreviatura'=>'required'
    ];

    public function save(){
        $rules=$this->rules;
        $this->validate($rules);

        $ciudad= new Ciudad();
        $ciudad->nombre=$this->nombre;
        $ciudad->slug=$this->slug;
        $ciudad->abreviatura=$this->abreviatura;

        $ciudad->save();

        return redirect()->route('ciudad.show');
    }

    public function updatedNombre($value){
        $this->slug= Str::slug($value);
    }

    public function render()
    {
        return view('livewire.admin.ciudad.create-ciudad')->layout('layouts.admin');
    }
}
