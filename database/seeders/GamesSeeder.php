<?php

namespace Database\Seeders;

use App\Models\Games;
use Database\Factories\GamesFactory;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class GamesSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Games::factory()->count(500)->create();
    }
}
