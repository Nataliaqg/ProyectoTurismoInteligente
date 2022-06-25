<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;

class TransportePrivado extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio');
    }
}
