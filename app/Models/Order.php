<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    const PENDIENTE=1; //SE HA GENERADO LA ORDEN PERO NO SE HA PAGADO
    const RECIBIDO=2; //SE HA GENERADO Y SE HA PAGADO A ORDEN
    const ANULADO=3;  //SE HA GENERADO LA ORDEN, NO SE PAGA, PERO TIENE VIGENCIA DE TIEMPO

    public function user(){
        return $this->belongsTo(User::class);
    }
}
