<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    use HasFactory;
    protected $fillable = ['id','capacidad_mesa','cantidad_mesas','precio','restaurante_id'];

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante');
    }
}
