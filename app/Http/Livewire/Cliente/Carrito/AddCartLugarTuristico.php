<?php

namespace App\Http\Livewire\Cliente\Carrito;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartLugarTuristico extends Component
{
    public $lugarTuristico,$precio,$categoria_id;
    public $quantity=15;
    public $qty=1; //variable que indica la cantidad que requiere el cliente
    public $options=[];

    public function mount(){ //trae info del campo precio del lugar turistico
        $this->precio=$this->lugarTuristico->precio;

        $this->categoria_id=$this->lugarTuristico->categoria->id;
        $this->quantity=qty_available($this->lugarTuristico->id,$this->categoria_id);

        if($this->lugarTuristico->imagen != null){ //si tiene imagen que mostrar
            $this->options['image']= $this->lugarTuristico->images->first()->url;
       }else{
            $this->options['image']= "https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940";
       }

       $this->options['categoria_id']= $this->lugarTuristico->categoria->id; //trae el id de la categoria que pertenece (1)
    }
    public function decrement(){
        $this->qty=$this->qty-1;
    }

    public function increment(){
        $this->qty=$this->qty+1;
    }

    public function addLugarTuristico(){ //atributos obligatorios pero pasan por encima
        Cart::add(['id' => $this->lugarTuristico->id,
                   'name' => $this->lugarTuristico->nombre,
                   'qty' => $this->qty,
                   'price' => $this->lugarTuristico->precio,
                   'weight' => 550,
                   'ciudad'=> $this->lugarTuristico->ciudad->nombre, 
                   'options'=> $this->options
                   ]);

        $this->quantity=qty_available($this->lugarTuristico->id,$this->categoria_id);

        $this->reset('qty'); //resetea el valor

        $this->emitTo('dropdown-cart','render'); //renderiza cuando vamos agregando
    }

    public function render()
    {
        return view('livewire.cliente.carrito.add-cart-lugar-turistico');
    }
}
