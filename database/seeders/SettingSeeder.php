<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array('name' => 'HelpDesk', 
                'email' => 'admin@gmail.com', 
                'phone' => '01611100752', 
                'address' => 'Tangail', 
                'images' => '',
                'icon' => '',
                'created_at' => now(), 
                'updated_at' => now()),
        );

        Setting::insert($settings);
    }
}