<?php

use Faker\Generator as Faker;

$factory->define(IDEALE\Models\BillPay::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date_due' => $faker->date(),
        'value' => $faker->randomFloat(2, 100, 1000),
        'done' => rand(0, 1)
    ];
});
