<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ability;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ability::create(['name' => 'hookroll']);
        Ability::create(['name' => 'unic']);
        Ability::create(['name' => 'hiab']);
        Ability::create(['name' => 'flatbody']);
        Ability::create(['name' => 'boxbody']);
        Ability::create(['name' => 'wing']);
    }
}
