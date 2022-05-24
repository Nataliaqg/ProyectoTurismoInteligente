<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\LugarTuristico;
use App\Models\Restaurante;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable=['nombre','abreviatura']; //atributos que seran manipulados
    protected $guarded=['id','created_at','updated_at'];

    public function hoteles(){ //Recupera info de los hoteles
        return $this->hasMany('App\Models\Hotel');
    }

    public function lugaresTuristicos(){ //Recupera info de los lugaresturisticos
        return $this->hasMany('App\Models\LugarTuristico');
    }

    public function restaurantes(){ //Recupera info de los restaurantes
        return $this->hasMany('App\Models\Restaurante');
    }

   
}
