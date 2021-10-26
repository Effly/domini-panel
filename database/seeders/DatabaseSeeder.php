<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            SlidersSettingsSeeder::class
        );
        $this->call(
            SlidesSeeder::class
        );
//        $this->call(
//            GamesSeeder::class
//        );
        $this->call(
            UserSeeder::class
        );
    }
}
