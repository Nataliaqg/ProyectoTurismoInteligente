<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use Illuminate\Database\Seeder;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurante::create([
            'nombre' => 'Casa del Camba',
            'direccion' => 'Av. Cristobal De Mendoza 1365, Santa Cruz de la Sierra',
            'descripcion' => 'Restaurante acogedor de comida camba con una variada carta de vinos y terraza.',
            'horaApertura' => '11:00',
            'horaCierre' => '23:00',
            'telefono' => '5645634',
            'capacidadMaximaMesa' => '50',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'Pollos Copacabana',
            'direccion' => 'SOCABAYA C. Potosí No. 1106 esq. Socabaya Zona Central',
            'descripcion' => 'restaurante especializado en pollo frito.',
            'horaApertura' => '11:00',
            'horaCierre' => '23:00',
            'telefono' => '6463758',
            'capacidadMaximaMesa' => '30',
            'ciudad_id' => '1',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'Santa Maria',
            'direccion' => 'av. marcelo terceros banzer, 3er anillo externo',
            'descripcion' => 'Santa María es un restaurante de comida rápida, deliciosa y fresca.',
            'horaApertura' => '11:00',
            'horaCierre' => '0:00',
            'telefono' => '4637547',
            'capacidadMaximaMesa' => '25',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'Pizza Rio',
            'direccion' => '3er anillo externo, avenida Beni',
            'descripcion' => 'restaurante especializado en pizzas de todo tipo.',
            'horaApertura' => '19:00',
            'horaCierre' => '23:00',
            'telefono' => '6467848',
            'capacidadMaximaMesa' => '35',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'El Cuadril',
            'direccion' => 'Av. Uruguay 456, Santa Cruz de la Sierra',
            'descripcion' => 'restaurante especializado en carnes de todo tipo.',
            'horaApertura' => '18:00',
            'horaCierre' => '23:00',
            'telefono' => '2634674',
            'capacidadMaximaMesa' => '40',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'Polllos el Solar',
            'direccion' => 'Av. Cañoto y, Santa Cruz de la Sierra',
            'descripcion' => 'restaurante especializado en pollo frito.',
            'horaApertura' => '11:00',
            'horaCierre' => '0:00',
            'telefono' => '3463757',
            'capacidadMaximaMesa' => '30',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'KFC',
            'direccion' => 'Av. El Trompillo entre MJ Santiestevan y, Rene Moreno',
            'descripcion' => 'restaurante especializado en pollo frito.',
            'horaApertura' => '11:00',
            'horaCierre' => '23:00',
            'telefono' => '8245726',
            'capacidadMaximaMesa' => '45',
            'ciudad_id' => '1',
            'categoria_id' => '3'
        ]);

        Restaurante::create([
            'nombre' => 'Jardin de Asia',
            'direccion' => 'Av. Marcelo Terceros Bánzer, Santa Cruz de la Sierra',
            'descripcion' => 'Variedad de deliciosos platos donde utilizan productos bolivianos con influencia asiática',
            'horaApertura' => '19:00',
            'horaCierre' => '0:00',
            'telefono' => '74574275',
            'capacidadMaximaMesa' => '70',
            'ciudad_id' => '9',
            'categoria_id' => '3'
        ]);
    }
}
