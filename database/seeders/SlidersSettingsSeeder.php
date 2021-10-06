<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_settings')->insert([
            'name' => 'big',
            'speed'=>'800'
        ]);
        DB::table('slider_settings')->insert([
            'name' => 'small',
            'speed'=>'850'
        ]);
    }
}
