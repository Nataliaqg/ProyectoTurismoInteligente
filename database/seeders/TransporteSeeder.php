<?php

namespace Database\Seeders;

use App\Models\Transporte;
use Illuminate\Database\Seeder;

class TransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transporte::create([
            'tipoTransporte' => 'BUS',
            'descripcion' => 'Aamrillo, Buscama, modelo 2021',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '1'
        ]);

        Transporte::create([
            'tipoTransporte' => 'AVION',
            'descripcion' => 'Rojo, Buscama, modelo 2020',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '3'
        ]);

       
    }
}
