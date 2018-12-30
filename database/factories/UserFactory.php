<?php

use Faker\Generator as Faker;
use IDEALE\Models\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'enrolment' => str_random(6),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'postcode' => function() use($faker){
            $postcode = preg_replace('/[^0-9]/','',$faker->postcode());
            return $postcode;
        },
        'number' => rand(1,100),
        'complement' => rand(1,10)%2==0?null:$faker->sentence,
        'city' => $faker->city,
        'neighborhood' => $faker->city,
        'uf' => collect(\IDEALE\Models\State::$states)->random(),
        'remember_token' => str_random(10),

    ];
});


