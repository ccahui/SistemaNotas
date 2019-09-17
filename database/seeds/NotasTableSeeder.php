<?php

use Illuminate\Database\Seeder;

use App\Models\Grado;
use App\Models\Alumno;
use App\Models\Cursos;
class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = Grado::all();
        foreach( $grados as $grado){
            $cursos_en_un_grado = $grado->cursos;
            $alumnos_en_un_grado = $grado->alumnos;
            foreach($alumnos_en_un_grado as $alumno_en_un_grado){
                foreach ($cursos_en_un_grado as $curso_dictado_en_un_grado ) {    
                    $curso_id = $curso_dictado_en_un_grado->id;
                    $alumno_en_un_grado->cursos()->attach($curso_id,[
                        'notas1' => rand(1,20),
                        'notas2' => rand(1,20),
                        'notas3' => rand(1,20),
                    ]);
                }
            }
        }
    }
}
