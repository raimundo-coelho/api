<?php

use Faker\Generator as Faker;

$factory->define(IDEALE\Models\Tip::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->streetName,
        'video_tip' => '129355495',
    ];
});
