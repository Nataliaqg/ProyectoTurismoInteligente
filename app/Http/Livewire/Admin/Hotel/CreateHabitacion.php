<?php

namespace App\Http\Livewire\Admin\Hotel;

use App\Models\Habitacion;
use App\Models\Hotel;
use Livewire\Component;

class CreateHabitacion extends Component
{
    
    public $hotel;
    public $habitaciones;
    public $habitacion;


    protected $listeners = ['delete'];

    public $createForm = [
        'tipo' => null,
        'cantidad' => null,
        'capacidadPersonaAdulta' => null,
        'capacidadPersonaMenor' => null,
        'precio' => null,
        //'hotel' => null
    ];

    public $editForm = [
        'open' =>false, 
        'tipo' => null,
        'cantidad' => null,
        'capacidadPersonaAdulta' => null,
        'capacidadPersonaMenor' => null,
        'precio' => null,
        //'hotel' => null
    ];

    protected $rules = [
        'createForm.tipo' => 'required',
        'createForm.cantidad' => 'required',
        'createForm.capacidadPersonaAdulta' => 'required',
        'createForm.capacidadPersonaMenor' => 'required',
        'createForm.precio' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.tipo' => 'tipo',
        'createForm.cantidad' => 'cantidad',
        'createForm.capacidadPersonaAdulta' => 'capacidadPersonaAdulta',
        'createForm.capacidadPersonaMenor' => 'capacidadPersonaMenor',
        'createForm.precio' => 'precio',

        'editForm.tipo' => 'tipo',
        'editForm.cantidad' => 'cantidad',
        'editForm.capacidadPersonaAdulta' => 'capacidadPersonaAdulta',
        'editForm.capacidadPersonaMenor' => 'capacidadPersonaMenor',
        'editForm.precio' => 'precio'
    ];

    public function mount(Hotel $hotel){
        $this->hotel = $hotel;
        $this->getHabitaciones(); //cargar todas las habitaciones de la bd
    }

    public function save(){
        $this->validate();

        Habitacion::create([
            'tipo' => $this->createForm['tipo'],
            'cantidad' => $this->createForm['cantidad'],
            'capacidadPersonaAdulta' => $this->createForm['capacidadPersonaAdulta'],
            'capacidadPersonaMenor' => $this->createForm['capacidadPersonaMenor'],
            'precio' => $this->createForm['precio'],
            'hotel_id' => $this->hotel->id
        ]);
        $this->emit('saved');
        
        $this->reset('createForm');
        $this->getHabitaciones(); // mostramos los registros


    }

    //public function edit(Habitacion $habitacion) -> esto trae todo el registro
    //public function edit($habitacion) -> esto el valor que le hayamos pasado anteriormente y lo almacena la variable $habitacion
    //Parte del Modal
    public function edit(Habitacion $habitacion){ 

        $this->resetValidation();

        $this->habitacion = $habitacion;

        $this->editForm['open'] = true;
        $this->editForm['tipo'] = $habitacion->tipo;
        $this->editForm['cantidad'] = $habitacion->cantidad;
        $this->editForm['capacidadPersonaAdulta'] = $habitacion->capacidadPersonaAdulta;
        $this->editForm['capacidadPersonaMenor'] = $habitacion->capacidadPersonaMenor;
        $this->editForm['precio'] = $habitacion->precio;

    }

    public function update(){
        $this->validate([
        'editForm.tipo' => 'required',
        'editForm.cantidad' => 'required',
        'editForm.capacidadPersonaAdulta' => 'required',
        'editForm.capacidadPersonaMenor' => 'required',
        'editForm.precio' => 'required'
        ]);

        $this->habitacion->update($this->editForm);

        $this->reset('editForm');
        $this->getHabitaciones();

    }


    //Obtener los registro de habitacion en la funcion para mostrarlos debajo del formulario
    public function getHabitaciones(){
        $this->habitaciones = Habitacion::all();  //traer todas las habitaciones de la bd
    }

    public function delete($habitacionId){
        $habitacionId = Habitacion::find($habitacionId);
        $habitacionId->delete();
        $this->getHabitaciones();
    }

    //Para cerrar modal
    public function open(){
        $this->reset('editForm');
    }

    public function render()
    {
        return view('livewire.admin.hotel.create-habitacion')->layout('layouts.admin');;
    }
}
