<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=> 'Lugar turistico',
        ]);
        Categoria::create([
            'nombre'=> 'Hotel',
        ]);
        Categoria::create([
            'nombre'=> 'Restaurante',
        ]);
        Categoria::create([
            'nombre'=> 'Viaje',
        ]);
        Categoria::create([
            'nombre'=> 'Transporte Privado',
        ]);
    }
}
