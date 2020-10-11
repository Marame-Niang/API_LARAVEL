<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    return [
        'matricule' => $faker->word,
        'cni' => $faker->word,
        'prenom' => $faker->word,
        'nom' => $faker->word,
        'datenaiss' => $faker->word,
        'adresse' => $faker->word,
        'email' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
