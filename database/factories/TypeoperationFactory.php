<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Typeoperation;
use Faker\Generator as Faker;

$factory->define(Typeoperation::class, function (Faker $faker) {

    return [
        'libelle' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
