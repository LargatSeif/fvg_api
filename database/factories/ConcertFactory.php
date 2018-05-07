<?php

use Faker\Generator as Faker;
use App\Models\Concert;
$factory->define(Concert::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => $faker->date(),
        'heure'=> $faker->time(),
        'festival_id'=>1
    ];
});
