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
            'tipoTransporte' => 'Toyota-435642',
            'descripcion' => 'Aamrillo, Buscama, modelo 2021',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '1'
        ]);

        Transporte::create([
            'tipoTransporte' => 'Nissan-78432',
            'descripcion' => 'Rojo, Buscama, modelo 2020',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '3'
        ]);

        Transporte::create([
            'tipoTransporte' => 'Mercedes-678432',
            'descripcion' => 'Verde, Buscama, modelo 2022',
            'capacidadMaximaAsientos' =>  '65',
            'agencias_id' => '2'
        ]);

        Transporte::create([
            'tipoTransporte' => 'Toyota-345432',
            'descripcion' => 'Blanco, Buscama, modelo 2019',
            'capacidadMaximaAsientos' =>  '70',
            'agencias_id' => '5'
        ]);

        Transporte::create([
            'tipoTransporte' => 'Mercedes-35432',
            'descripcion' => 'Rojo, Buscama, modelo 2018',
            'capacidadMaximaAsientos' =>  '58',
            'agencias_id' => '6'
        ]);
    }
}
