<?php

namespace Database\Seeders;

use App\Models\TipoAgencia;
use Illuminate\Database\Seeder;

class TipoAgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoAgencia::create([
            'tipoAgencia' => 'Avion',
        ]);
        TipoAgencia::create([
            'tipoAgencia' => 'Flota'
        ]);
    }
}
