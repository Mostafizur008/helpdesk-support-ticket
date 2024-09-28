<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = array(
            array('name' => 'Low', 
                'created_at' => now(), 
                'updated_at' => now()),

                array('name' => 'Medium', 
                'created_at' => now(), 
                'updated_at' => now()),

                array('name' => 'Hight', 
                'created_at' => now(), 
                'updated_at' => now()),

        );

        Priority::insert($priorities);
    }
}