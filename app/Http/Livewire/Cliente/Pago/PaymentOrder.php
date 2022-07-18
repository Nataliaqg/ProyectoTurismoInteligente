<?php

namespace App\Http\Livewire\Cliente\Pago;

use App\Models\Order;
use App\Models\ReservaHabitacion;
use App\Models\ReservaMesa;
use App\Models\ReservaTransportePrivado;
use Livewire\Component;

class PaymentOrder extends Component
{

    public $order;

    protected $listeners=['payOrder'];

    public function mount(Order $order){
        $this->order=$order;
        
    }

    public function payOrder(){
        $this->order->status = 2; //RECIBIDO
        $datosreservas=json_decode($this->order->content);

         foreach ($datosreservas as $item){
            if( $item->options->categoria_id ==5){
                $reservatransporte = new ReservaTransportePrivado();
                $reservatransporte->fecha = $item->options->fecha;
                $reservatransporte->transporte_id= $item->id;     
                $reservatransporte->save();     
            }
            if( $item->options->categoria_id ==3){
                $reservamesa = new ReservaMesa();
                $reservamesa->fecha = $item->options->fecha;
                $reservamesa->cantidad_mesas= $item->qty;     
                $reservamesa->mesa_id= $item->id;    
                $reservamesa->save();     
            }
            if( $item->options->categoria_id ==2){
                $reservahabitacion = new ReservaHabitacion();
                $reservahabitacion->fecha = $item->options->fecha;
                $reservahabitacion->cantidad_habitaciones= $item->qty;     
                $reservahabitacion->habitacion_id= $item->id;    
                $reservahabitacion->save();     
            }
         }
       

        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $items= json_decode($this->order->content); //convierte el contenido  que estaba en formato json
        return view('livewire.cliente.pago.payment-order',compact('items'));
    }
}
