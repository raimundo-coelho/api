<?php

use Faker\Generator as Faker;

$factory->define(IDEALE\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->city
    ];
});
