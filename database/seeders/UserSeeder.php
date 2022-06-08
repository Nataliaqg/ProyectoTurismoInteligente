<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Paul Cruz',
            'email' => 'Paul@gmail.com',
            'password' => bcrypt('12345678'),
            'carnetIdentidad' => '12756822',
            'telefono' => '78565231',
            'edad' => '21'
        ])->assignRole('admin');

        User::create([
            'name' => 'Natalia Quiroga',
            'email' => 'nataliaquirogag@gmail.com',
            'password' => bcrypt('987654321'),
            'carnetIdentidad' => '14324673',
            'telefono' => '73563364',
            'edad' => '21'
        ])->assignRole('admin');

        User::create([
            'name' => 'Melanie Yupanqui',
            'email' => 'Melanie@gmail.com',
            'password' => bcrypt('987654321'),
            'carnetIdentidad' => '12398327',
            'telefono' => '73264891',
            'edad' => '21'
        ])->assignRole('admin');

        User::create([
            'name' => 'David Suarez',
            'email' => 'David@gmail.com',
            'password' => bcrypt('987654321'),
            'carnetIdentidad' => '91248932',
            'telefono' => '77234925',
            'edad' => '21'
        ])->assignRole('admin');

        User::create([
            'name' => 'Elian Álvarez',
            'email' => 'Elian@gmail.com',
            'password' => bcrypt('987654321'),
            'carnetIdentidad' => '97911211',
            'telefono' => '61821287',
            'edad' => '21'
        ])->assignRole('admin');;

        User::create([
            'name' => 'Cliente',
            'email' => 'Cliente@gmail.com',
            'password' => bcrypt('12345678'),
            'carnetIdentidad' => '19287347',
            'telefono' => '72291192',
            'edad' => '21'
        ]);
        
        User::factory(100)->create();
    }
}
