<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    
    protected $fillable = ['id','tipo','cantidad','capacidadPersonaAdulta','capacidadPersonaMenor','precio','hotel_id'];

   //Relacion uno a muchos inversa

   public function hotel(){
       return $this->belongsTo(Hotel::class);
   }
}
