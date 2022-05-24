<?php

namespace App\Http\Livewire\Admin\Restaurante;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Ciudad;
use App\Models\Image;
use App\Models\Restaurante;
use CreateCiudadsTable;
use Illuminate\Support\Facades\Storage;

class EditRestaurante extends Component
{
    public $restaurante, $ciudads;
    public $ciudad_id;

    protected $rules = [
        'restaurante.ciudad_id' => 'nullable',
        'restaurante.nombre' => 'required',
        'restaurante.descripcion' => 'required',
        'restaurante.direccion' => 'required',
        'restaurante.telefono' => 'required',
        'restaurante.capacidadMaximaMesa' => 'required',
        'restaurante.horaCierre' => 'nullable',
        'restaurante.horaApertura' => 'nullable',
    ];
    protected $listeners = ['refreshRestaurante'];

    public function mount(Restaurante $restaurante)
    {
        $this->restaurante = $restaurante;
        $this->ciudads = Ciudad::all();
    }
    public  function refreshRestaurante(){
        $this->restaurante=$this->restaurante->fresh();
    }
    
    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);
        $this->restaurante->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Restaurante: ' .$this->restaurante->nombre .' Actualizada');   
        $this->emit('saved');
    }
    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->restaurante=$this->restaurante->fresh();
    }

    public function render()
    {
    
        return view('livewire.admin.restaurante.edit-restaurante')->layout('layouts.admin');;
    }
}
