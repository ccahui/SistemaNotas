<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Alumno;
use App\Models\Salon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Alumno::class, function (Faker $faker) {
   
    if(Salon::all()->count() == 0) {
        factory(Salon::class)->create();
    }

    $passwordDefault = Hash::make("1234");
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lexify('Apellido ????'),
        'gmail' => preg_replace('/@example\..*/', '@gmail.com', $faker->unique()->safeEmail),
        'salon_id' => Salon::all()->random()->id,
        'password' =>$passwordDefault 
    ];
});
