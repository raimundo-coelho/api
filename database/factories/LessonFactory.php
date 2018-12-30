<?php

use Faker\Generator as Faker;

$factory->define(IDEALE\Models\Lesson::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->streetName,
        'url_video' => $faker->mimeType,
        'video_id' => rand(123456, 345678),
        'duration_lession' => $faker->time('0:i:s'),
    ];
});
