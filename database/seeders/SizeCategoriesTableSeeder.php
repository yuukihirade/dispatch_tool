<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SizeCategory;

class SizeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SizeCategory::create(['name' => '10t']);
        SizeCategory::create(['name' => '8t']);
        SizeCategory::create(['name' => '4t']);
    }
}
