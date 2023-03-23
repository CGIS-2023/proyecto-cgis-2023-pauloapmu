<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Administrador",
                'email' => "administrador@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Nutricionista 1",
                'email' => "nutricionista1@nutricionista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Nutricionista 2",
                'email' => "nutricionista2@nutricionista.com",
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
