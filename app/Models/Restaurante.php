<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class Restaurante extends Model
{
    use HasFactory;

    public function ciudad(){
        return $this->belongsTo('App\Models\Ciudad');
    }
}
