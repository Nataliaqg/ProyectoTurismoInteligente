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
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Natalia Quiroga',
            'email' => 'nataliaquirogag@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('admin');

        User::create([
            'name' => 'Melanie Yupanqui',
            'email' => 'Melanie@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('admin');

        User::create([
            'name' => 'David Suarez',
            'email' => 'David@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('admin');

        User::create([
            'name' => 'Elian Álvarez',
            'email' => 'Elian@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('admin');;

        User::create([
            'name' => 'Cliente',
            'email' => 'Cliente@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(100)->create();
    }
}
