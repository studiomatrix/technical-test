<?php

use Faker\Generator as Faker;

$factory->define(App\Cook::class, function (Faker $faker) {
    return [
        'speciality' => $faker->words(2, true),
        'description' => $faker->paragraph
    ];
});
