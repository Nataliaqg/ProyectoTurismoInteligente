<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['id','tipoTransporte','descripcion','capacidadMaximaAsientos'];

    //Relacion uno a muchos inversa

    public function agencia(){
        return $this->belongsTo(Agencia::class);
    }
    public function viajes(){
        return $this->hasMany(Viaje::class);
    }
}
