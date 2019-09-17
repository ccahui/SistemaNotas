<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Profesor;
use App\Models\Salon;
use App\Models\Curso;
use Illuminate\Support\Collection;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /*
            Salon
            Curso
        */
        $this->assertTrue(true);
    }

    public function obtenerSalonesPorCadaCurso(){
        $profesor = Profesor::all()->first();
        $cursos_unicos = $profesor->cursos->unique();
        $arrayes = array();
        foreach($cursos_unicos as $curso){
            $salones = $curso->salones()->where('profesor_id',$profesor->id)->get();
            $array = array(
                'curso'=>$curso,
                'salones'=>$salones
            );
            array_push($arrayes, $array);
        }
        return $arrayes;
/*
        foreach($arrayes as $array){
            print($array['curso']->id." - ".$array['curso']->nombre."\n");
            foreach($array['salones'] as $salon){
                print($salon->seccion);
            }
            print("\n");
        }
*/
    }
}
