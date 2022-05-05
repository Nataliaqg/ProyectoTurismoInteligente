<?php

namespace App\Http\Livewire\Admin\Ciudad;

use Livewire\Component;
use App\Models\Ciudad;
use Illuminate\Support\Str;

class EditCiudad extends Component
{
    public $ciudad,$slug;

    
    protected $rules =[
        'ciudad.nombre' => 'required',
        'ciudad.slug' => 'required|unique:ciudads,slug',
        'ciudad.abreviatura'=>'required'
    ];

    protected $listeners=['delete'];

    public function mount(Ciudad $ciudad){ //captura lo que se envia desde la url
        $this->ciudad=$ciudad;
    }

    public function refreshCiudad(){
        $this->ciudad=$this->ciudad->fresh();
    }

    public function updatedCiudadNombre($value){
        $this->ciudad->slug= Str::slug($value);
        $this->slug = $this->ciudad->slug;
    }

    public function updatedCiudadAbreviatura($value){
        $this->ciudad->slug= Str::slug($value);
        $this->slug = $this->ciudad->slug;
    }

    public function save(){
        $rules=$this->rules;

        $rules['slug'] = 'required|unique:ciudads,slug,'. $this->ciudad->id;

       
       $this->validate($rules);
       //$this->ciudad->abreviatura=$this->abreviatura;
       $this->ciudad->slug=$this->slug;

       $this->ciudad->save();
       $this->emit('saved');
    }

    public function delete(){
        $this->ciudad->delete();
        return redirect()->route('admin.index'); //redireccciono a mi listado de ciudades
    }

    public function render()
    {
        return view('livewire.admin.ciudad.edit-ciudad')->layout('layouts.admin');
    }
}
