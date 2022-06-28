<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HoteleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Hotel::create([
            'nombre' => 'Camin Real Suites',
            'direccion' => 'Centro de la ciudad, cerca del Museo',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '89772543',
            'capacidadMaximaHabitacion' => '48',
            'ciudad_id' => '1',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Eden by Bluebay',
            'direccion' => 'Centro de la ciudad, cerca del Coliseo',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '89773343',
            'capacidadMaximaHabitacion' => '30',
            'ciudad_id' => '2',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Colonial',
            'direccion' => 'Centro de la ciudad, cerca del Zoologico',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '99753343',
            'capacidadMaximaHabitacion' => '30',
            'ciudad_id' => '3',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'AranJuez',
            'direccion' => 'Centro de la ciudad, cerca de la Universidad mayor de San Simon',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '94758043',
            'capacidadMaximaHabitacion' => '40',
            'ciudad_id' => '4',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Parador Santa Maria La Real',
            'direccion' => 'Centro de la ciudad, cerca de la Plaza Principal',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '94587043',
            'capacidadMaximaHabitacion' => '32',
            'ciudad_id' => '5',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Los Parrales',
            'direccion' => 'Centro de la ciudad, cerca del Polideportivo Nuñez',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '9668043',
            'capacidadMaximaHabitacion' => '27',
            'ciudad_id' => '6',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Dorado',
            'direccion' => 'Centro de la ciudad, cerca de la fuente de agua',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '3',
            'telefono' => '96544143',
            'capacidadMaximaHabitacion' => '20',
            'ciudad_id' => '7',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Los Chope',
            'direccion' => 'Centro de la ciudad, al frente de la comisaria',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '76628043',
            'capacidadMaximaHabitacion' => '23',
            'ciudad_id' => '8',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Los tajibos',
            'direccion' => '3er anillo externo',
            'descripcion' => 'Hotel 5 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '5',
            'telefono' => '89231543',
            'capacidadMaximaHabitacion' => '53',
            'ciudad_id' => '9',
            'categoria_id' => '2'
        ]);

        Hotel::create([
            'nombre' => 'Camin Real',
            'direccion' => '5to anillo interno',
            'descripcion' => 'Hotel 4 estrellas ubicado en el centro de la ciudad con todas las comodidades que el cliente puede desear, wifi, psicinas, gimnacios',
            'categoria' => '4',
            'telefono' => '89256543',
            'capacidadMaximaHabitacion' => '60',
            'ciudad_id' => '9',
            'categoria_id' => '2'
        ]);
    }
}
