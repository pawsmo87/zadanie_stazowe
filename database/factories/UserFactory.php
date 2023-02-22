<?php


namespace Database\Factories;
$factory = app(\Illuminate\Database\Eloquent\Factory::class);

use Faker\Generator as Faker;
use App\Models\Klient;

$factory->define(Klient::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
    ];
});