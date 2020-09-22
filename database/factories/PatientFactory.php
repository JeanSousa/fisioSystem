<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rg' => '999999999',
        'cpf' => '111111111',
        'birth_date' => '1990-05-05'
    ];
});

