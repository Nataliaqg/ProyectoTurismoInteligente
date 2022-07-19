<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaLugarTuristico extends Model
{
    use HasFactory;
    public function lugaresTuristicos(){
        return $this->belongsTo('App\Models\LugarTuristico');
    }
}
