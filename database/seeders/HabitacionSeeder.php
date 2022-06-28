<?php

namespace Database\Seeders;

use App\Models\Habitacion;
use Illuminate\Database\Seeder;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Habitacion::create([
            'tipo' => 'Individual',
            'cantidad' => '21',
            'capacidadPersonaAdulta' => '1',
            'capacidadPersonaMenor' => '1',
            'precio' => '150',
            'hotel_id' => '1'
        ]);

        Habitacion::create([
            'tipo' => 'Doble',
            'cantidad' => '12',
            'capacidadPersonaAdulta' => '2',
            'capacidadPersonaMenor' => '1',
            'precio' => '220',
            'hotel_id' => '1'
        ]);

        Habitacion::create([
            'tipo' => 'Doble',
            'cantidad' => '12',
            'capacidadPersonaAdulta' => '2',
            'capacidadPersonaMenor' => '1',
            'precio' => '220',
            'hotel_id' => '1'
        ]);

        Habitacion::create([
            'tipo' => 'Matrimonial',
            'cantidad' => '8',
            'capacidadPersonaAdulta' => '2',
            'capacidadPersonaMenor' => '0',
            'precio' => '200',
            'hotel_id' => '1'
        ]);

        Habitacion::create([
            'tipo' => 'Grupal',
            'cantidad' => '7',
            'capacidadPersonaAdulta' => '6',
            'capacidadPersonaMenor' => '4',
            'precio' => '700',
            'hotel_id' => '1'
        ]);
    }
}
