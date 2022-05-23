<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;


    protected $fillable = ['id', 'nombre','tipo'];

    //Relacion uno a muchos 

    public function transportes(){
        return $this->hasMany(Transporte::class);
    }

}
