<?php

namespace App\Http\Livewire\Cliente\Carrito;

use App\Models\ReservaMesa;
use App\Models\ReservaTransportePrivado;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class AddTransportePrivado extends Component
{


    public $transportePrivado, $categoria_id, $mesa;
    public $quantity;
    public $qty= 1;
    public $options=[];
    public $fecha=null;
    public $reserva;
  

    public function mount()
    {
        $this->categoria_id = $this->transportePrivado->categoria->id;


        
        if ($this->transportePrivado->imagen != null) { //si tiene imagen que mostrar
            $this->options['image'] = $this->transportePrivado->images->first()->url;
        } else {
            $this->options['image'] = "https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940";
        }
        
        $this->options['categoria_id'] = $this->transportePrivado->categoria->id; 
      
    }
    public function updatedFecha(){
        
     /*   $serviciosquery = ReservaTransportePrivado::query()->whereHas('transporteprivado', function (Builder $query) {
            $query->where('transporte_id', $this->qty);
        });
        $serviciosquery = $serviciosquery->whereHas('transporteprivado', function (Builder $query) {
            $query->where('fecha', $this->fecha);
        });*/
        
        $this->reserva = ReservaTransportePrivado::where('transporte_id',$this->transportePrivado->id)->where('fecha',$this->fecha)->first();

      $this->quantity = qty_available($this->transportePrivado->id, $this->categoria_id,$this->reserva);
        $this->options['fecha'] = $this->fecha;
    }


    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addTransporte()
    { //atributos obligatorios pero pasan por encima
        Cart::add([
            'id' => $this->transportePrivado->id,
            'name' => $this->transportePrivado->tipoTransPrivado->nombre,
            'qty' => $this->qty,
            'price' => $this->transportePrivado->precio,
            'weight' => 550,

            'options' => $this->options
        ]);

        
        $this->reset('qty'); //resetea el valor
        $this->emitTo('dropdown-cart', 'render'); //renderiza cuando vamos agregando
    }

    public function render()
    {
        return view('livewire.cliente.carrito.add-transporte-privado');
    }
}
