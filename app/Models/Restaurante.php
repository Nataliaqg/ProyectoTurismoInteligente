<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\Categoria;

class Restaurante extends Model
{
    use HasFactory;

    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

    //relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    
    public function mesas(){ //Recupera info de las mesas
        return $this->hasMany('App\Models\mesa');
    }
}
