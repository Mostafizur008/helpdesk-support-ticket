<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = array(
            array('name' => 'Coumputer', 
                'created_at' => now(), 
                'updated_at' => now()),

                array('name' => 'Router', 
                'created_at' => now(), 
                'updated_at' => now()),

                array('name' => 'Electronic', 
                'created_at' => now(), 
                'updated_at' => now()),

                array('name' => 'Machine', 
                'created_at' => now(), 
                'updated_at' => now()),

        );

        Department::insert($departments);
    }
}