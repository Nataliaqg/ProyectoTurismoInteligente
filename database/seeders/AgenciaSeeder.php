<?php

namespace Database\Seeders;

use App\Models\Agencia;
use Illuminate\Database\Seeder;

class AgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Agencia::create([
            'nombre' => 'Aerocon',
            'tipo'   => 'Aviones'
        ]);

        Agencia::create([
            'nombre' => 'Amaszonas',
            'tipo'   => 'Aviones'
        ]);

        Agencia::create([
            'nombre' => 'BOA',
            'tipo'   => 'Aviones'
        ]);

        Agencia::create([
            'nombre' => 'Ecojet',
            'tipo'   => 'Aviones'
        ]);

        Agencia::create([
            'nombre' => 'TAM Bolivia',
            'tipo'   => 'Aviones'
        ]);

        Agencia::create([
            'nombre' => 'BOLIVAR',
            'tipo'   => 'Buses'
        ]);

        Agencia::create([
            'nombre' => 'TRANS COPACABANA I MEM',
            'tipo'   => 'Buses'
        ]);

        Agencia::create([
            'nombre' => 'NUEVO CONTINENTE',
            'tipo'   => 'Buses'
        ]);
        
        Agencia::create([
            'nombre' => 'PANASUR',
            'tipo'   => 'Buses'
        ]);

        Agencia::create([
            'nombre' => 'BOLPAR',
            'tipo'   => 'Buses'
        ]);

        Agencia::create([
            'nombre' => 'TRANS COPACABANA',
            'tipo'   => 'Buses'
        ]);

        Agencia::create([
            'nombre' => 'LA PREFERIDA BUS',
            'tipo'   => 'Buses'
        ]);

    }
}
