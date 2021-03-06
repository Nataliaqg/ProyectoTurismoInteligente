<?php

namespace App\Http\Livewire\Cliente\Pago;

use App\Models\LugarTuristico;
use App\Models\Order;
use App\Models\ReservaHabitacion;
use App\Models\ReservaMesa;
use App\Models\ReservaTransportePrivado;
use App\Models\Viaje;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{

    use AuthorizesRequests;

    public $order;
  

    protected $listeners=['payOrder'];

    public function mount(Order $order){
        $this->order=$order;
        $datosreservas=json_decode($this->order->content);
        foreach ($datosreservas as $item){  
            if($item->options->categoria_id ==4 ){
            $viaje= Viaje::find($item->id);
            $viaje->cantidad = $viaje->cantidad - $item->qty;
            $viaje->save();
      
      }
        
     }
        
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
            if($item->options->categoria_id ==1 ){
                $lugar= LugarTuristico::find($item->id);
                $lugar->cantidad = $lugar->cantidad - $item->qty;
                $lugar->save();
          
          }
            
         }
       

        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $this->authorize('author',$this->order);
        $this->authorize('payment',$this->order);

        
        $items= json_decode($this->order->content); //convierte el contenido  que estaba en formato json
        return view('livewire.cliente.pago.payment-order',compact('items'));
    }
}
