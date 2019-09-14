<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profesor;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lexify('Apellido ????'),
        'especialidad'=>$faker->lexify('Especialidad ???? '),
    ];
});
