<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;


    protected $fillable = ['id', 'nombre','tipoAgencia_id'];

    //Relacion uno a muchos 

    public function transportes(){
        return $this->hasMany(Transporte::class);
    }

    //Relacion uno a muchos inversa
    public function tipoAgencia(){
        return $this->belongsTo(TipoAgencia::class,'tipoAgencia_id');
    }

}
