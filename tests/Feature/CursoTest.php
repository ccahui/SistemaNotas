<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Curso;
use App\Models\Grado;

class CursoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexListado()
    {
        $curso = factory(Curso::class)->create();

        $response = $this->get("/cursos");
        $response->assertStatus(200)
            ->assertSee($curso->nombre)
            ->assertSee($curso->grado->nombre);
    }

    public function testIndexSinAlumnos()
    {
        $response = $this->get("/cursos");
        $response->assertStatus(200)
            ->assertSee('No se obtuvieron resultados');
    }

    public function testCreate(){
        $grado = factory(Grado::class)->create();

        $response = $this->get("/cursos/create");
        $response->assertStatus(200)
            ->assertSee($grado->id)
            ->assertSee($grado->nombre);        
    }

    public function testStoreAlumno(){
        
        $grado = factory(Grado::class)->create(); 

        $curso = factory(Curso::class)->make([ 
            'grado_id'=>$grado->id,
        ]); 
        
        $request = [
            "nombre"=>$curso->nombre,
            "grado_id"=>$curso->grado_id,
        ];
        
        $response = $this->post("/cursos",$request);
        $response->assertRedirect("/cursos");

        $this->assertDatabaseHas('cursos',[
            'nombre'=> $curso->nombre,
            'grado_id'=>$curso->grado_id,
        ]);
    }

    public function testEdit(){

        $curso = factory(Curso::class)->create();
        $grado = $curso->grado;

        $response = $this->get("/cursos/{$curso->id}/edit");
        $response->assertStatus(200)
            ->assertSee($grado->id)
            ->assertSee($grado->nombre);        
    }

    public function testUpdate(){

        $curso = factory(Curso::class)->create(); 

        $request = [
            "nombre"=>"Matematicas",
            "grado_id"=>$curso->grado->id,
        ];
        
        $response = $this->put("/cursos/$curso->id",$request);
        $response->assertRedirect("/cursos");

        $this->assertDatabaseHas('cursos',[
            'nombre'=> "Matematicas",
        ]);
    }
    
    public function testShowDetalle(){

        $curso = factory(Curso::class)->create();
        $grado = $curso->grado;

        $response = $this->get("/cursos/{$curso->id}");
        $response->assertStatus(200)
            ->assertSee($curso->nombre)
            ->assertSee($grado->nombre);      
    }

    public function testSearchPorNombre(){

        $curso = factory(Curso::class)->create();

        $response = $this->get("/cursos/search?buscar={$curso->nombre}");
        $response->assertStatus(200)
            ->assertSee($curso->nombre);
    }

    public function testSearchPorNombresSinResultados(){

        $buscar = "dasd";
        $response = $this->get("/cursos/search?buscar={$buscar}");
        $response->assertStatus(200)
        ->assertSee('No se obtuvieron resultados');
    }

    public function testDestroyEliminar(){
        
        $curso = factory(Curso::class)->create(); 
        
        $response = $this->delete("/cursos/$curso->id");
        $response->assertRedirect("/cursos");

        $this->assertDatabaseMissing('cursos',[
            'id'=>$curso->id
        ]);
    }
}
