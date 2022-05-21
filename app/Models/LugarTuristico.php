<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class LugarTuristico extends Model
{
    use HasFactory;

    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad');
    }
    //relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
