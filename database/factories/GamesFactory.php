<?php

namespace Database\Factories;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class GamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Games::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $words = explode(" ", $name);
        $acronym = "";
        foreach ($words as $word) {
            $acronym .= $word[0];
        }
        $platform = $this->faker->randomElement(['ios','amazone','android']);
        $verison = $this->faker->randomElement(['free','premium']);
        $published = $this->faker->randomElement(['yes','no']);
        $slider = $this->faker->randomElement(['big','small']);

//        $tech_name = $acronym.'.' . $platform.'.' . $verison;
        $tech_name = $acronym.'.' . $platform.'.' . $verison;
        $path = 'public/storage/Images/'.$platform.'/'.$tech_name.'/';
//        Storage::makeDirectory('public/Images/'.$platform.'/'.$tech_name.'/');

//        chmod($path,777);
//        $image = $this->faker->image('public/Images');

        return [
            'name' => $name,
            'tech_name' => $tech_name,
            'slider' => $slider,
            'published'=>$published,
            'version'=>$verison,
            'platform'=>$platform,
            'sale'=>NULL,
            'link'=>$this->faker->url(),
            'image_name'=>$path,

        ];
    }
}
