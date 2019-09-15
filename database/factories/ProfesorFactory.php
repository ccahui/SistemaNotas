<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profesor;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lexify('Apellido ????'),
        'gmail' =>  preg_replace('/@example\..*/', '@gmail.com', $faker->unique()->safeEmail),
        'especialidad'=>$faker->lexify('Especialidad ???? '),
    ];
});
