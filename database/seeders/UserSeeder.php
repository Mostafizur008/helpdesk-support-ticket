<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array('name' => 'Admin', 
                'email' => 'admin@gmail.com', 
                'phone' => '01611100752', 
                'password' => bcrypt('12345678'), 
                'role' => '1', 
                'image' => 'https://www.pngitem.com/pimgs/m/80-800194_transparent-users-icon-png-flat-user-icon-png.png',
                'created_at' => now(), 
                'updated_at' => now()),

            array('name' => 'User', 
                'email' => 'user@gmail.com', 
                'phone' => '01511100752', 
                'password' => bcrypt('12345678'), 
                'role' => '0', 
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIKcTkARlljahDz7xR5gq-lwY3NSwsYMQdl_AlXfua4Yc2QcQ9QIG38gxtEiMGNAdoEck&usqp=CAU', 
                'created_at' => now(), 
                'updated_at' => now()),
        );

        User::insert($users);
    }
}