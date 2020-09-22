<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
      'street' => $faker->name,
      'number' => '9999',
      'cep' => '14400000',
      'neighborhood' => $faker->name,
      'city' => $faker->city,
      'state' => $faker->name,
    ];
});
