<?php

namespace Database\Seeders;

use App\Models\TransportePrivado;
use Illuminate\Database\Seeder;

class TransportePrivadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransportePrivado::create([
            'tipoTransPrivado_id'=>'1',
            'precio'=>'600',
            'capacidadPersonas'=>'10',
            'categoria_id'=>'5'
        ]);
        TransportePrivado::create([
            'tipoTransPrivado_id'=>'2',
            'precio'=>'300',
            'capacidadPersonas'=>'5',
            'categoria_id'=>'5'
        ]);
    }
}
