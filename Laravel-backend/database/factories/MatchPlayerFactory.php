<?php

use Faker\Generator as Faker;

$factory->define(App\MatchPlayer::class, function (Faker $faker) {
    return [
        'match_id' => $faker->numberBetween($min = 1, $max = 150),
        'player_id' => $faker->numberBetween($min = 1, $max = 120),
        'points' => $faker->numberBetween($min = 0, $max = 30),
        'minutes' => $faker->numberBetween($min = 0, $max = 48)
    ];
});
