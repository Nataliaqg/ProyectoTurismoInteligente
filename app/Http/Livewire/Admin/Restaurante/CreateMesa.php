<?php

namespace App\Http\Livewire\Admin\Restaurante;

use App\Models\mesa;
use App\Models\Restaurante;
use Livewire\Component;

class CreateMesa extends Component
{
    //mesas para almecenar todas la mesas 
    // mesa para almacenar una mesa antes de iditarla
    public $mesas, $mesa, $restaurante;
       protected $listeners = ['delete'];

    public $createForm = [
        'cantidad_mesas' => null,
        'capacidad_mesa' => null,
        'precio' => null,

    ];
    public $editForm = [
        'open' => false,
        'cantidad_mesas' => null,
        'capacidad_mesa' => null,
        'precio' => null,

    ];

    public $rules = [

        'createForm.cantidad_mesas' => 'required',
        'createForm.capacidad_mesa' => 'required',
        'createForm.precio' => 'required',
        

    ];
     protected $validationAttributes = [
        'createForm.cantidad_mesas' => 'capacidad',
        'createForm.capacidad_mesa' => 'cantidad',  
        'createForm.precio' => 'precio', 
        'editForm.cantidad_mesas' => 'capacidad',
        'editForm.capacidad_mesa' => 'cantidad',
        'editForm.precio' => 'precio',   
    
    ];

    // que se inicialize el metodo get
    public function mount()
    {
        $this->getMesas();
    }   

      public function save()
    {
        $this->validate();
        $mesa = new Mesa();

        $mesa->cantidad_mesas = $this->createForm['cantidad_mesas'];
        $mesa->capacidad_mesa = $this->createForm['capacidad_mesa'];
        $mesa->precio = $this->createForm['precio'];
        $mesa->restaurante_id = $this->restaurante;
        $mesa->save();
        $this->reset('createForm'); // que se resetee
        $this->getMesas();
    }

    //debo cambiar  algo 
    public function edit(mesa $mesa)
    {
        $this->resetValidation();
        $this->mesa = $mesa;

        $this->editForm['open'] = true;
        $this->editForm['cantidad_mesas'] = $mesa->cantidad_mesas;
        $this->editForm['capacidad_mesa'] = $mesa->capacidad_mesa;
        $this->editForm['precio'] = $mesa->precio;
    }

    public function update()
    {
        $this->validate([
            'editForm.cantidad_mesas' => 'required',
            'editForm.capacidad_mesa' => 'required',
            'editForm.precio' => 'required',
        ]);

        $this->mesa->update($this->editForm);
        $this->reset('editForm');
        $this->getMesas();
    }

    public function delete(mesa $mesa)
    {
        $mesa->delete();
        $this->getMesas();
    }

    //traer todas las mesas en mesas
    public function getMesas()
    {
        $mesa_id = $this->restaurante;
       
        $this->mesas = mesa::where('restaurante_id',$mesa_id)->get();
    }
     //Para cerrar modal
     public function open(){
        $this->reset('editForm');
    }



    public function render()
    {
        return view('livewire.admin.restaurante.create-mesa')->layout('layouts.admin');
    }
}
