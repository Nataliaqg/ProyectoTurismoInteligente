<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'nombre'=> 'La paz',
            'abreviatura'=>'LP'
        ]);
        Ciudad::create([
            'nombre'=> 'Oruro',
            'abreviatura'=>'OR'
        ]);
        Ciudad::create([
            'nombre'=> 'Potosí',
            'abreviatura'=>'PT'
        ]);
        Ciudad::create([
            'nombre'=> 'Cochabamba',
            'abreviatura'=>'CB'
        ]);
        Ciudad::create([
            'nombre'=> 'Chuquisaca',
            'abreviatura'=>'CH'
        ]);
        Ciudad::create([
            'nombre'=> 'Tarija',
            'abreviatura'=>'TJ'
        ]);
        Ciudad::create([
            'nombre'=> 'Pando',
            'abreviatura'=>'PD'
        ]);
        Ciudad::create([
            'nombre'=> 'Beni',
            'abreviatura'=>'BE'
        ]);
        Ciudad::create([
            'nombre'=> 'Santa Cruz',
            'abreviatura'=>'SC'
        ]);
    }
}
