<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\Categoria;

class Hotel extends Model
{
    use HasFactory;

public function ciudad(){ //en singular pq solo tiene una
    return $this->belongsTo('App\Models\Ciudad');
}

public function categoria(){
    return $this->belongsTo('App\Models\Categoria','categoria_id');
}
//relacion uno a muchos polimorfica
public function images(){
    return $this->morphMany(Image::class,'imageable');
}

//Relacion uno a muchos 

public function habitaciones(){
    return $this->hasMany(Habitacion::class);
}

}

