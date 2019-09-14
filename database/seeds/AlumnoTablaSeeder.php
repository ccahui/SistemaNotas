<?php

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Salon;

class AlumnoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidadAlumnos = 20;
        $this->crearAlumnosEnTodosLosSalones($cantidadAlumnos);
    }

    public function crearAlumnosEnTodosLosSalones($cantidadAlumnos){
        $salones = Salon::all();
        foreach($salones as $salon){
            factory(Alumno::class, $cantidadAlumnos)->create([
                'salon_id'=>$salon->id
            ]);
        }

        
    }
}
