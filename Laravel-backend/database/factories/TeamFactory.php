<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'league_id' => 1,
        'wins' => $faker->numberBetween($min = 0, $max = 50),
        'loses' => $faker->numberBetween($min = 0, $max = 50)
    ];
});
