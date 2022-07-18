<?php

namespace App\Http\Livewire\Cliente\Carrito;

use App\Models\Habitacion;
use App\Models\Hotel;
use App\Models\ReservaHabitacion;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use PhpParser\BuilderHelpers;

class AddCartHotel extends Component
{
    public $hotel;
    public $categoria_id;
    public $habitaciones;
    public $habitacion_precio = 1;
    public $habitacion_id ="";
    public $quantity;
    public $qty=1;
    public $options = [];
    //public $fechaI;
    public $fecha = null;
    public $cantreservahabitacion;
    public $prueba;
  

    //public $fechaI,$fechaS,$diasDiferencia;
    

    /* protected $rules = [
        'fechaI' => 'required',
        'fechaS' => 'required',
    ]; */

    public function mount(){
        $this->habitaciones =  $this->hotel->habitaciones;
       $this->categoria_id = 2;

        if ($this->hotel->imagen != null) { //si tiene imagen que mostrar
            $this->options['image'] = $this->hotel->images->first()->url;
        } else {
            $this->options['image'] = "https://www.detectahotel.com/himg/62/c0/84/ice-85676218-68620422_3XL-430714.jpg";
        }

       $this->options['categoria_id'] = $this->categoria_id; 

    }

    public function updatedHabitacionId($value)
    {
        if ($this->fecha){
        $habitacion = $this->hotel->habitaciones->find($value);
        $this->habitacion_precio = $habitacion->precio;

        $this->prueba = $value;
        $serviciosquery = ReservaHabitacion::query()->whereHas('habitacion', function (Builder $query) {
            $query->where('habitacion_id', $this->prueba);
        });
        $serviciosquery = $serviciosquery->whereHas('habitacion', function (Builder $query) {
            $query->where('fecha', $this->fecha);
        });

        $this->cantreservahabitacion = $serviciosquery->sum('cantidad_habitaciones');


        $this->quantity = qty_available($this->hotel->id, $this->categoria_id, $habitacion->id,$this->cantreservahabitacion);
        $this->options['habitacion_tipo'] = $habitacion->tipo;
        $this->options['habitacion_id'] = $habitacion->id;
        $this->options['fecha'] = $this->fecha; 
        }
    }

    public function updatedFecha(){
        if($this->prueba){
            $this->updatedHabitacionId($this->prueba);
        }
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }


    public function addHotel(){
        Cart::add([
            'id' => $this->hotel->id,
            'name' => $this->hotel->nombre,
            'qty' => $this->qty,
            'price' => $this->habitacion_precio,
            'weight' => 550,

            'options' => $this->options
        ]);

        
        $this->reset('qty'); 

        $this->emitTo('dropdown-cart', 'render'); //renderiza cuando vamos agregando
    }
      
    public function render()
    {
       /*  $this->fechaI = Carbon::parse($request->input('fechaI'));
       $this->fechaS = Carbon::parse($request->input('fechaS'));
       $this->diasDiferencia = $this->$fechaI->diffInDays($this->$fechaS);
 */
       /*  $Fi = $this->fechaI;
        $Fs = $this->fechaS; */
       // $this->diasDiferencia = $Fs->diffInDays($Fi);
        //$IdHotel = $this->hotel->id;
        //$this->habitaciones = Habitacion::where('hotel_id',$IdHotel)->get();
        return view('livewire.cliente.carrito.add-cart-hotel');
    }
}
