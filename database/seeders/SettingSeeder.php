<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            'setting_name'=> 'Book_a_Table',
            'setting_value'=> '01881471974',
        ]);
        Setting::insert([
            'setting_name'=> 'Email',
            'setting_value'=> 'mahmudaljahin@gmail.com',
        ]);
        Setting::insert([
            'setting_name'=> 'address',
            'setting_value'=> 'A108 Adam Street, New York, NY 535022',
        ]);
        Setting::insert([
            'setting_name'=> 'Opening',
            'setting_value'=> 'Mon-Sat: 11AM - 23PM; Sunday: Closed',
        ]);
    }
}
