<?php

namespace Database\Seeders;

use App\Models\Informacion;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Informacion::create([
            'nombre' => 'TraBol',
            'ubicacion' => 'Santa Cruz, Bolivia',
            'direccion' => '1er Anillo zona centro',
            'email' => 'TraBol@gmail.com',
            'telefono' => '77539014',
            'facebook' => 'pruebaF',
            'instagram' => 'pruebaI',
            'whatsapp' => 'pruebaW',
        ]);

    }
}
