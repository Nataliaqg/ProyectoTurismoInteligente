<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransportePrivado;

class TipoTransPrivado extends Model
{
    use HasFactory;

    public function transportePrivados(){
        return $this->hasMany('App\Models\TransportePrivado');
    }
}
