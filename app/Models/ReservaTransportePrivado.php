<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaTransportePrivado extends Model
{
    use HasFactory;
    public function transporteprivado()
    {
        return $this->belongsTo('App\Models\TransportePrivado');
    }
}
