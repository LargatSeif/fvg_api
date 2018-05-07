<?php

use Faker\Generator as Faker;
use App\Models\Ticket;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'barcode' => $faker->ean13(),
        'concert_id'=>4
    ];
});
