<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    use HasFactory;

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante');
    }
}
