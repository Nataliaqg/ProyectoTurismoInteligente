<?php

namespace Database\Seeders;

use App\Models\ReservaTransportePrivado;
use Illuminate\Database\Seeder;

class ReservaTansportePrivadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservaTransportePrivado::create([
            'fecha' => '2022-07-19',            
            'transporte_id'=>'1',
        ]);
       ReservaTransportePrivado::create([
            'fecha' => '2022-07-20',            
            'transporte_id'=>'1',
        ]);
        /*
        ReservaTransportePrivado::create([
            'fecha' => '2022-07-19',
           
            'tranporte_id'=>'2',
        ]);*/
        
    }
}
