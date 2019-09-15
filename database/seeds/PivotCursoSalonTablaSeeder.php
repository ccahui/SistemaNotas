<?php

use Illuminate\Database\Seeder;
use App\Models\Grado;
use App\Models\Salon;
use App\Models\Curso;
use App\Models\Profesor;

class PivotCursoSalonTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->llenarCursosEnCadaSalonPorGradosyAsignarUnProfesor();    
    
    }

    public function llenarCursosEnCadaSalonPorGradosyAsignarUnProfesor(){
        $grados = Grado::all();
        foreach( $grados as $grado){
            $cursos_en_un_grado = $grado->cursos;
            $secciones_en_un_grado = $grado->salones;
            foreach($secciones_en_un_grado as $seccion_en_un_grado){
                foreach ($cursos_en_un_grado as $curso_dictado_en_un_grado ) {    
                    $curso_id = $curso_dictado_en_un_grado->id;
                    $seccion_en_un_grado->cursos()->attach($curso_id,[
                        'profesor_id' => Profesor::all()->random()->id
                    ]);
                }
            }
        }
    }
}
