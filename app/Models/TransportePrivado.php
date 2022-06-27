<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
use App\Models\TipoTransPrivado;

class TransportePrivado extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio');
    }

    //relacion uno a muchos
    public function tipoTransPrivado(){
        return $this->belongsTo(TipoTransPrivado::class,'tipoTransPrivado_id');
    }

     //relacion uno a muchos polimorfica
     public function images()
     {
         return $this->morphMany(Image::class, 'imageable');
     }
}
