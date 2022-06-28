<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LugarTuristico;
use App\Models\Hotel;
use App\Models\Restaurante;
use App\Models\Viaje;
use App\Models\TransportePrivado;

class Categoria extends Model
{
    use HasFactory;

    public function LugarTuristicos(){
        return $this->hasMany(LugarTuristico::class);
    }

    public function Hoteles(){
        return $this->hasMany(Hotel::class);
    }

    public function Restaurantes(){
        return $this->hasMany(Restaurante::class);
    }

    public function Viajes(){
        return $this->hasMany(Viaje::class);
    }

    public function TransportePrivados(){
        return $this->hasMany(TransportePrivado::class);
    }
}
