<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        Department::create(['name' => 'admin']);
        Department::create(['name' => 'sales']);
        Department::create(['name' => 'dispatch']);
        Department::create(['name' => 'driver']);
    }
}
