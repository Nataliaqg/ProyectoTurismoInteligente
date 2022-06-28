<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transporte;
use App\Models\Ciudad;
use App\Models\Categoria;

class Viaje extends Model
{
    use HasFactory;
    protected $fillable=['fecha','hora','precio'];
    protected $guarded=['id','created_at','updated_at'];

    public function transporte(){
        return $this->belongsTo(Transporte::class,'transporte_id');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

    public function ciudadOrigen(){
        return $this->belongsTo('App\Models\Ciudad','ciudadOrigen_id');
    }
    
    public function ciudadDestino(){
        return $this->belongsTo('App\Models\Ciudad','ciudadDestino_id');
    }

    //relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
