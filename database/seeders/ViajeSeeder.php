<?php

namespace Database\Seeders;

use App\Models\Viaje;
use Illuminate\Database\Seeder;

class ViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Viaje::create([
            'fecha'=>'2022-07-08',
            'hora'=>'20:30:00',
            'precio'=>'400',
            'transporte_id'=>'2',
            'ciudadOrigen_id'=>'1',
            'ciudadDestino_id'=>'9',
            'categoria_id'=>'4'
        ]);
        Viaje::create([
            'fecha'=>'2022-07-10',
            'hora'=>'22:30:00',
            'precio'=>'500',
            'transporte_id'=>'2',
            'ciudadOrigen_id'=>'9',
            'ciudadDestino_id'=>'1',
            'categoria_id'=>'4'
        ]);
    }
}
