<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAgencia extends Model
{
    use HasFactory;

    protected $fillable = ['id','tipoAgencia'];

    //Relacion uno a muchos
    public function agencias(){
        return $this->hasMany(Agencia::class);
    }

  
}
