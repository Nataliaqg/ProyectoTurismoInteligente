<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\User;
use App\Models\TransportePrivado;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable=['fechaInicio','fechafinal','cantidadPersonas'];
    protected $guarded=['id','created_at','updated_at'];

    public function ciudadOrigen(){
        return $this->belongsTo('App\Models\Ciudad','ciudadOrigen_id');
    }
    
    public function ciudadDestino(){
        return $this->belongsTo('App\Models\Ciudad','ciudadDestino_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion muchos a muchos
    public function transportePrivados(){
        return $this->belongsToMany('App\Models\TransportePrivado');
    }
}
