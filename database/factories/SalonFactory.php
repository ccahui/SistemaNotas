<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Salon;
use App\Models\Grado;
use Faker\Generator as Faker;

$factory->define(Salon::class, function (Faker $faker) {
    
    if(Grado::all()->count() == 0) {
        factory(Grado::class)->create();
    }
    return [
        'seccion'=>$faker->lexify('Salon ???? '),
        'grado_id' => Grado::all()->random()->id, 
    ];
});
