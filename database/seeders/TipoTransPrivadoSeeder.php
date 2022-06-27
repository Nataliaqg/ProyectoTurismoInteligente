<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoTransPrivado;

class TipoTransPrivadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoTransPrivado::create([
            'nombre'=>'BUS'
        ]);

        TipoTransPrivado::create([
            'nombre'=>'AUTO'
        ]);
    }
}
