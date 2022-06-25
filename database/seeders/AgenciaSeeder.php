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
            'tipoAgencia_id' => '1'
        ]);

        Agencia::create([
            'nombre' => 'Amaszonas',
            'tipoAgencia_id' => '1'
        ]);

        Agencia::create([
            'nombre' => 'BOA',
            'tipoAgencia_id' => '1'
        ]);

        Agencia::create([
            'nombre' => 'Ecojet',
            'tipoAgencia_id' => '1'
        ]);

        Agencia::create([
            'nombre' => 'TAM Bolivia',
            'tipoAgencia_id' => '1'
        ]);

        //flotas 
        Agencia::create([
            'nombre' => 'BOLIVAR',
            'tipoAgencia_id' => '2'
        ]);

        Agencia::create([
            'nombre' => 'TRANS COPACABANA I MEM',
            'tipoAgencia_id' => '2'
        ]);

        Agencia::create([
            'nombre' => 'NUEVO CONTINENTE',
            'tipoAgencia_id' => '2'
        ]);
        
        Agencia::create([
            'nombre' => 'PANASUR',
            'tipoAgencia_id' => '2'
        ]);

        Agencia::create([
            'nombre' => 'BOLPAR',
            'tipoAgencia_id' => '2'
        ]);

        Agencia::create([
            'nombre' => 'TRANS COPACABANA',
            'tipoAgencia_id' => '2'
        ]);

        Agencia::create([
            'nombre' => 'LA PREFERIDA BUS',
            'tipoAgencia_id' => '2'
        ]);

    }
}
