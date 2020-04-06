<?php

use Faker\Generator as Faker;

$factory->define(App\Match::class, function (Faker $faker) {
    return [
        'away_team_id' => $faker->numberBetween($min = 1, $max = 30),
        'home_team_id' => $faker->numberBetween($min = 1, $max = 30),
        'away_team_score' => $faker->numberBetween($min = 70, $max = 120),
        'home_team_score' => $faker->numberBetween($min = 70, $max = 120),
        'date' => $faker->date()
    ];
});
