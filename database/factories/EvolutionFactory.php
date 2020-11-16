<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Evolution;
use Faker\Generator as Faker;

$factory->define(Evolution::class, function (Faker $faker) {
    return [
        'patient_id' => 1,
        'initial_blood_pressure' => '12.8',
        'final_blood_pressure' => '12.7',
        'o2_saturation' => '90',
        'evolution_date' => '2020-11-16 00:00:0000',
        'observation' => $faker->name
    ];
});
