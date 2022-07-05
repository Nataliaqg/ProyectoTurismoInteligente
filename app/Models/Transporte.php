<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['id','modelo','descripcion','capacidadMaximaAsientos'];

    //Relacion uno a muchos inversa

    public function agencia(){
        return $this->belongsTo(Agencia::class,'agencias_id');
    }

    public function viajes(){
        return $this->hasMany(Viaje::class);
    }
}
