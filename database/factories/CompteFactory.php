<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compte;
use Faker\Generator as Faker;

$factory->define(Compte::class, function (Faker $faker) {

    return [
        'clients_id' => $faker->randomDigitNotNull,
        'typecomptes_id' => $faker->randomDigitNotNull,
        'num_compte' => $faker->word,
        'cle_rip' => $faker->word,
        'frais_ouverture' => $faker->word,
        'agio' => $faker->randomDigitNotNull,
        'date_ouverture' => $faker->word,
        'date_fermuture' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
