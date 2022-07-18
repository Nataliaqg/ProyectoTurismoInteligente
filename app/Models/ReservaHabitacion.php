<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHabitacion extends Model
{
    use HasFactory;
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }
}
