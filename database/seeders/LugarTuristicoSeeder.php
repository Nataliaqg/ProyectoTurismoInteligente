<?php

namespace Database\Seeders;

use App\Models\LugarTuristico;
use Illuminate\Database\Seeder;

class LugarTuristicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        LugarTuristico::create([
            'nombre' => 'Fuerte de Samaipata',
            'descripcion' => 'Es un sitio arqueologico precolombino de Bolivia',
            'direccion' => 'Ubicado a pocos kilometros del pueblo de Samaipata en la provincia florida',
            'horaEntrada' => '08:00',
            'horaSalida' => '16:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '9',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'Espejillo',
            'descripcion' => 'Es un lugar con ambiente de selva tropical,recomendado para disfrutar del aire libre',
            'direccion' => 'Carrera anitgua a cochabamba, km 26 Santa Cruz ',
            'horaEntrada' => '08:00',
            'horaSalida' => '18:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '9',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'Parque Nacional Amboro',
            'descripcion' => 'Es una area protegida de Bolivia y una de las reservas a nivel mundial con mayor diversidad',
            'direccion' => 'Se halla ubicado al oeste del departamento de Santa Cruz, en el denomidado "Codo de los andes"',
            'horaEntrada' => '09:00',
            'horaSalida' => '22:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '9',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'Zoologico',
            'descripcion' => 'Es una area protegida que alberga diferentes tipos de animales de la region',
            'direccion' => 'Tercer Anillo Interno y Radial 27, Santa Cruz de la Sierra, Bolivia',
            'horaEntrada' => '10:00',
            'horaSalida' => '20:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '9',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'La Casa de la Moneda',
            'descripcion' => 'es un museo y archivo histórico ubicado en la ciudad de Potosí (Bolivia)',
            'direccion' => 'Ayacucho, Villa Imperial de Potosí',
            'horaEntrada' => '06:00',
            'horaSalida' => '23:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '3',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'El Cristo',
            'descripcion' => 'Es una estatua monumental de Jesucristo, que se encuentra sobre el cerro de San Pedro en la ciudad de Cochabamba, Bolivia',
            'direccion' => 'Av. de la Concordia, Cochabamba',
            'horaEntrada' => '08:00',
            'horaSalida' => '19:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '4',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'El Teleferico',
            'descripcion' => 'transporte por Cable urbano Teleférico La Paz - El Alto, que une las ciudades de La Paz y El Alto',
            'direccion' => 'Avenida Estación Central Teleferico Linea Roja S/N Zona Pura Pura',
            'horaEntrada' => '06:00',
            'horaSalida' => '23:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '1',
            'categoria_id' => '1'
        ]);

        LugarTuristico::create([
            'nombre' => 'Rio Pirai',
            'descripcion' => 'es un río amazónico boliviano, un afluente del río Yapacaní, que forma parte del curso bajo del río Grande',
            'direccion' => 'se encuentra bordeando el 4to anillo zona este, como de ida al Urubo',
            'horaEntrada' => '06:00',
            'horaSalida' => '22:00',
            'precio' => '10',
            'cantidad'=>'0',
            'ciudad_id' => '8',
            'categoria_id' => '1'
        ]);
    }
}
