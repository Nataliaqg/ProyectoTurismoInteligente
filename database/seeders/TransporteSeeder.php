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
            'modelo' => 'Boeing 747',
            'descripcion' => 'Blanco versión 2017',
            'capacidadMaximaAsientos' =>  '55',
            'agencias_id' => '1',
            'tipoAgencia_id' => '1'
        ]);

        Transporte::create([
            'modelo' => 'Boeing 777',
            'descripcion' => 'Amarillo, Buscama, con baño, 2 pisos, versión 2019',
            'capacidadMaximaAsientos' =>  '60',
            'agencias_id' => '2',
            'tipoAgencia_id' => '1'
        ]);

        Transporte::create([
            'modelo' => 'Boeing 767',
            'descripcion' => 'Blanco, versión 2019',
            'capacidadMaximaAsientos' =>  '80',
            'agencias_id' => '2',
            'tipoAgencia_id' => '1'
        ]);

        Transporte::create([
            'modelo' => 'Airbus A330',
            'descripcion' => 'verde, versión 2012',
            'capacidadMaximaAsientos' =>  '70',
            'agencias_id' => '3',
            'tipoAgencia_id' => '1'
        ]);

        Transporte::create([
            'modelo' => 'Embraer 170',
            'descripcion' => 'verde, versión 2012',
            'capacidadMaximaAsientos' =>  '88',
            'agencias_id' => '5',
            'tipoAgencia_id' => '1'
        ]);


        //Flotas
        Transporte::create([
            'modelo' => 'Trans-Comarapa',
            'descripcion' => 'Amarillo, Buscama, con baño, versión 2015',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '8',
            'tipoAgencia_id' => '2'
        ]);


        Transporte::create([
            'modelo' => 'Trans-Vallegrande',
            'descripcion' => 'Rojo, Buscama, sin baño versión 2012',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '9',
            'tipoAgencia_id' => '2'
        ]);


        Transporte::create([
            'modelo' => 'Trans-Cochabamba',
            'descripcion' => 'Azul, Buscama, con baño, 2 pisos, versión 2012',
            'capacidadMaximaAsientos' =>  '50',
            'agencias_id' => '10',
            'tipoAgencia_id' => '2'
        ]);

        Transporte::create([
            'modelo' => 'Trans-Beni',
            'descripcion' => 'Celeste, Buscama, con baño, 2 pisos, versión 2011',
            'capacidadMaximaAsientos' =>  '42',
            'agencias_id' => '10',
            'tipoAgencia_id' => '2'
        ]);

        Transporte::create([
            'modelo' => 'Trans-LaPaz',
            'descripcion' => 'Blanco, Buscama, con baño, 2 pisos, versión 2010',
            'capacidadMaximaAsientos' =>  '42',
            'agencias_id' => '12',
            'tipoAgencia_id' => '2'
        ]);

       
    }
}
