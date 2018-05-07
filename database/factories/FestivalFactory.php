<?php

use Faker\Generator as Faker;
use App\Models\Festival;

$factory->define(Festival::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => $faker->dateTime()
    ];
});
