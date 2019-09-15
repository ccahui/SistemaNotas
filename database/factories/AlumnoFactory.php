<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Alumno;
use App\Models\Salon;
use Faker\Generator as Faker;


$factory->define(Alumno::class, function (Faker $faker) {
   
    if(Salon::all()->count() == 0) {
        factory(Salon::class)->create();
    }
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lexify('Apellido ????'),
        'gmail' => preg_replace('/@example\..*/', '@gmail.com', $faker->unique()->safeEmail),
        'salon_id' => Salon::all()->random()->id, 
    ];
});
