<?php

use Faker\Generator as Faker;

$factory->define(\App\CookingRequest::class, function (Faker $faker) {
    return [
        'approved' => $faker->boolean
    ];
});
