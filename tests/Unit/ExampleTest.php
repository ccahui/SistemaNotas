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
        $profesor = Profesor::all()->first();
        $cursos_unicos = $profesor->cursos->unique();

           
        foreach($cursos_unicos as $curso){
            $salones = $curso->salones()->where('profesor_id',$profesor->id)->get();
           print("$curso->nombre: ");
            foreach($salones as $salon){
                
                 print("$salon->grado_id $salon->seccion  ");

            }
            print("\n");
        }

        $this->assertTrue(true);
    }
}
