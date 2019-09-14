<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Curso;
use Faker\Generator as Faker;
use App\Models\Grado;
$factory->define(Curso::class, function (Faker $faker) {
    
    if(Grado::all()->count() == 0) {
        factory(Grado::class)->create();
    }
    return [
        'nombre'=>$faker->lexify('Curso ???? '),
        'grado_id' => Grado::all()->random()->id, 
    ];
});
