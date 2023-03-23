<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NutricionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nutricionistas')->insert([
            [
                'n_licencia' => 012345678,
                'telefono' => 666666666,
                'user_id' => 2,
            ],
            [
                'n_licencia' => 112345678,
                'telefono' => 666666660,
                'user_id' => 3,
            ],
        ]);
        //

    }
}
