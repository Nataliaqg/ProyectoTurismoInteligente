<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    
   protected $fillable = ['id','name','capacidadPersonaAdulta','capacidadPersonaMenor','precio'];

   //Relacion uno a muchos inversa

   public function hotel(){
       return $this->belongsTo(Hotel::class);
   }
}
