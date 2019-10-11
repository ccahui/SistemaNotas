<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Alumno;
use App\Models\Curso;

class NotasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testVisualizarNota()
    {
        $alumno = factory(Alumno::class)->create(); // Factory creo un Salon Un Grado
        $curso = factory(Curso::class)->create(); // Creo un curso de el unico grado que hay actualmente
        $grado = $alumno->getGrado();

        $alumno->cursos()->attach($curso->id,[
            'notas1' => rand(1,20),
            'notas2' => rand(1,20),
            'notas3' => rand(1,20),
        ]);
        
        $nota = $this->obtenerNotas($alumno, $curso);

        $response = $this->get("/notas/alumno/{$alumno->id}");
        $response->assertStatus(200)
            ->assertSee($grado->nombre)
            ->assertSee($alumno->apellido)
            ->assertSee($curso->nombre)
            ->assertSee($nota->notas1)
            ->assertSee($nota->notas2)
            ->assertSee($nota->notas3);
    }

    public function obtenerNotas($alumno, $curso){
        $nota = $alumno->cursos()->where('curso_id',$curso->id)->get()->first()->pivot;
        return $nota;
    }
}
