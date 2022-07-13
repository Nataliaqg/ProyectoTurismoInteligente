<?php

namespace App\Http\Livewire\Cliente\Carrito;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartViaje extends Component
{
    public $viaje;
    public $quantity;
    public $qty=1; //variable que indica la cantidad que requiere el cliente
    public $categoria_id, $ciudadOrigen;
    public $options=[];

    public function mount(){
        $this->quantity=$this->viaje->transporte->capacidadMaximaAsientos; //su tope es la cantidad max de asientos dependiendo su transporte
        
        if($this->viaje->imagen != null){ //si tiene imagen que mostrar
            $this->options['image']= $this->viaje->images->first()->url;
        }else{
            $this->options['image']= "https://thumbs.dreamstime.com/b/pares-de-boletos-azules-en-blanco-de-la-pel%C3%ADcula-o-de-la-rifa-aislados-en-el-ccb-blanco-78484952.jpg";
        }

        $this->options['categoria_id']= $this->viaje->categoria->id; //trae el id de la categoria que pertenece (4)
        $this->options['ciudadOrigen']= $this->viaje->ciudadOrigen;
    }

    public function decrement(){
        $this->qty=$this->qty-1;
    }

    public function increment(){
        $this->qty=$this->qty+1;
    }

    public function addViaje(){ //atributos obligatorios pero pasan por encima
        Cart::add(['id' => $this->viaje->id,
                   'name' => $this->viaje->ciudadDestino->nombre,
                   'qty' => $this->qty,
                   'price' => $this->viaje->precio,
                   'weight' => 550,
                   'options'=> $this->options
                   ]);
        
        $this->emitTo('dropdown-cart','render'); //renderiza cuando vamos agregando
    }

    public function render()
    {
        return view('livewire.cliente.carrito.add-cart-viaje');
    }
}
