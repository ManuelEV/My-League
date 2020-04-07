<?php

use Faker\Generator as Faker;

$factory->define(App\Match::class, function (Faker $faker) {
    $dt = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');
    $date = $dt->format("Y-m-d");
    return [
        'away_team_id' => $faker->numberBetween($min = 1, $max = 30),
        'home_team_id' => $faker->numberBetween($min = 1, $max = 30),
        'away_team_score' => $faker->numberBetween($min = 70, $max = 120),
        'home_team_score' => $faker->numberBetween($min = 70, $max = 120),
        'date' => $date
    ];
});
