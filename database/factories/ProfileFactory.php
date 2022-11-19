<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(AdminProfile::class, function (Faker $faker) {
    return [
        'phone_number' => $faker->unique()->phone,
        'city_name' => $faker->city_name,
        'age' => $faker->age,
        'gender' => $faker->gender,
        'profile_pic' => $faker->unique()->profile_pic
    ];
});




