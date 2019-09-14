<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Grado;
use Faker\Generator as Faker;

$factory->define(Grado::class, function (Faker $faker) {
    return [
        'numero'=> $faker->unique()->numberBetween(10, 100),
        'nombre'=>$faker->lexify('???? Grado'),
    ];
});
