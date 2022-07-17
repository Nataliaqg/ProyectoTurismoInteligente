<?php

namespace App\Http\Livewire\Cliente\Carrito;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartRestaurante extends Component
{
    public $restaurante, $categoria_id, $mesas;
    public $mesa_precio = 1;
    public $mesa_id = "";
    public $quantity;
    public $qty=1; //variable que indica la cantidad que requiere el cliente
    public $options = [];

    public function mount()
    {
        $this->mesas = $this->restaurante->mesas;
        $this->categoria_id = $this->restaurante->categoria->id;
     //   $this->quantity = qty_available($this->restaurante->id, $this->categoria_id);

        if ($this->restaurante->imagen != null) { //si tiene imagen que mostrar
            $this->options['image'] = $this->restaurante->images->first()->url;
        } else {
            $this->options['image'] = "https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940";
        }
        // aqui le puedo agrrgar mesa parece 
        $this->options['categoria_id'] = $this->restaurante->categoria->id; //trae el id de la categoria que pertenece (1)
    }

    public function updatedMesaId($value)
    {
        $mesa = $this->restaurante->mesas->find($value);
        $this->mesa_precio = $mesa->precio;
        $this->quantity = qty_available($this->restaurante->id, $this->categoria_id, $mesa->id);
        $this->options['mesa_capacidad'] = $mesa->capacidad_mesa;
        $this->options['mesa_id'] = $mesa->id;
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addRestaurante()
    { //atributos obligatorios pero pasan por encima
        Cart::add([
            'id' => $this->restaurante->id,
            'name' => $this->restaurante->nombre,
            'qty' => $this->qty,
            'price' => $this->mesa_precio,
            'weight' => 550,

            'options' => $this->options
        ]);

        //$this->quantity=qty_available($this->lugarTuristico->id,$this->categoria_id);

        $this->reset('qty'); //resetea el valor

        $this->emitTo('dropdown-cart', 'render'); //renderiza cuando vamos agregando
    }

    public function render()
    {
        return view('livewire.cliente.carrito.add-cart-restaurante');
    }
}
