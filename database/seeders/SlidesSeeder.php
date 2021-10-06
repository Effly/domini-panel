<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels_names = ['first_big', 'second_big', 'third_big', 'first_small', 'second_small', 'third_small', 'fourth_small', 'fifth_small'];
        foreach ($labels_names as $labels_name) {
            DB::table('sliders')->insert([
                'name' => $labels_name,
            ]);
        }
    }
}
