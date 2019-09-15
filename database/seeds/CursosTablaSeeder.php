<?php

use Illuminate\Database\Seeder;
use App\Models\Grado;
use App\Models\Curso;

class CursosTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generarCursos();
    }
    
    public function generarCursos(){
        $grados = Grado::all();
        foreach($grados as $grado){

            $grado->cursos()->createMany([
               ['nombre'=> "Matematica $grado->numero"],
               ['nombre'=> "Comunicacion $grado->numero"],
               ['nombre'=> "Lenguaje $grado->numero"],
               ['nombre'=> "CTA $grado->numero"],
               ['nombre'=> "Algebra $grado->numero"],
               ['nombre'=> "Fisica $grado->numero"],
            ]);
        }
    }
    
}
