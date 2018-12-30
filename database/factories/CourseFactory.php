<?php

use Faker\Generator as Faker;

$factory->define(IDEALE\Models\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'price' => $faker->randomFloat(2, 100, 1000),
        'discount' => rand(5,50),
        'price_discount' => $faker->randomFloat(2, 100, 1000),
        'plots' => rand(1,12),
        'price_plots' => $faker->randomFloat(2, 100, 1000),
        'workload' => rand(22,68),
        'status' => 1,
        'image' => $faker->imageUrl($width = 400, $height = 233),
        'video_presentation' => 'video.mpd',
        'banner' => $faker->imageUrl($width = 1600, $height = 1067),
        'description' => $faker->text,
    ];
});