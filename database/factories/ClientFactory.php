<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    return [
        'typeclients_id' => $faker->randomDigitNotNull,
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'adresse' => $faker->word,
        'tel' => $faker->word,
        'email' => $faker->word,
        'profession' => $faker->word,
        'salaire' => $faker->word,
        'cni' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
