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
        Ability::create(['name' => 'フックロール']);
        Ability::create(['name' => 'ユニック']);
        Ability::create(['name' => 'ヒアブ']);
        Ability::create(['name' => '平ボディ']);
        Ability::create(['name' => 'ハコ車']);
        Ability::create(['name' => 'ウイング']);
    }
}
