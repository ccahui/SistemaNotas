<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profesor;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Profesor::class, function (Faker $faker) {
  
    $passwordDefault = Hash::make("1234");  
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lexify('Apellido ????'),
        'gmail' =>  preg_replace('/@example\..*/', '@gmail.com', $faker->unique()->safeEmail),
        'password' => $passwordDefault, // password
    ];
});
