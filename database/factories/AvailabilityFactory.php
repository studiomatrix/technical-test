<?php

use Faker\Generator as Faker;

$factory->define(App\Availability::class, function (Faker $faker) {
    return [
        'day' => $faker->numberBetween(0, 6)
    ];
});
