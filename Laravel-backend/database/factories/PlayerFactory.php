<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'team_id' => $faker->numberBetween($min = 1, $max = 30),
        'name' => $faker->name,
        'age' => $faker->numberBetween($min = 15, $max = 40),
        'points' => $faker->numberBetween($min = 0, $max = 100)
    ];
});
