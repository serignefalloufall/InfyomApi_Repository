<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {

    return [
        'typeoperations_id' => $faker->randomDigitNotNull,
        'comptes_id' => $faker->randomDigitNotNull,
        'montant' => $faker->word,
        'dateoperation' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
