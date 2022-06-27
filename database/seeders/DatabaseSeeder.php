<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/hoteles');
        Storage::makeDirectory('public/hoteles');
        Storage::deleteDirectory('public/lugarturisticos');
        Storage::makeDirectory('public/lugarturisticos');
        Storage::deleteDirectory('public/restaurantes');
        Storage::makeDirectory('public/restaurantes');
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(TipoAgenciaSeeder::class);
        $this->call(AgenciaSeeder::class);
        $this->call(TransporteSeeder::class);
        $this->call(TipoTransPrivadoSeeder::class);
        $this->call(HoteleSeeder::class);
        $this->call(RestauranteSeeder::class);
        $this->call(LugarTuristicoSeeder::class);
    }

}
