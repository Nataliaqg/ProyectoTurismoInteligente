<?php

namespace Database\Seeders;

use App\Models\mesa;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mesa::create([
            'capacidad_mesa' => '5',
            'cantidad_mesas' => '3',
            'precio' => '20',
            'restaurante_id' => '1',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '4',
            'cantidad_mesas' => '2',
            'precio' => '15',
            'restaurante_id' => '1',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '8',
            'cantidad_mesas' => '3',
            'precio' => '50',
            'restaurante_id' => '1',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '4',
            'cantidad_mesas' => '3',
            'precio' => '10',
            'restaurante_id' => '2',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '5',
            'cantidad_mesas' => '4',
            'precio' => '15',
            'restaurante_id' => '2',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '4',
            'cantidad_mesas' => '3',
            'precio' => '10',
            'restaurante_id' => '3',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '5',
            'cantidad_mesas' => '4',
            'precio' => '15',
            'restaurante_id' => '2',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '4',
            'cantidad_mesas' => '3',
            'precio' => '10',
            'restaurante_id' => '3',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '5',
            'cantidad_mesas' => '4',
            'precio' => '15',
            'restaurante_id' => '5',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '4',
            'cantidad_mesas' => '3',
            'precio' => '10',
            'restaurante_id' => '5',
            
        ]);
        mesa::create([
            'capacidad_mesa' => '5',
            'cantidad_mesas' => '4',
            'precio' => '15',
            'restaurante_id' => '6',
            
        ]);
    }
}
