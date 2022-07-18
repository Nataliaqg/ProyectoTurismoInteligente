<?php

namespace Database\Seeders;

use App\Models\ReservaMesa;
use Illuminate\Database\Seeder;

class ReservaMesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservaMesa::create([
            'fecha' => '2022-07-19',
            'cantidad_mesas' => '4',
            'mesa_id'=>'1',
        ]);
        ReservaMesa::create([
            'fecha' => '2022-07-20',
            'cantidad_mesas' => '4',
            'mesa_id'=>'2',
        ]);
        ReservaMesa::create([
            'fecha' => '2022-07-21',
            'cantidad_mesas' => '4',
            'mesa_id'=>'3',
        ]);
    }
}
