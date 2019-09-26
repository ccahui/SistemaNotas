<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Profesor;

class ProfesorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexListadoProfesores()
    {
        $profesor = factory(Profesor::class)->create();

        $response = $this->get("/profesores");
        $response->assertStatus(200)
            ->assertSee($profesor->nombre)
            ->assertSee($profesor->apellido)
            ->assertSee($profesor->gmail);
    }

    public function testIndexSinProfesores()
    {
        $response = $this->get("/profesores");
        $response->assertStatus(200)
            ->assertSee('No se obtuvieron resultados');
    }

    public function testCreate(){
        
        $response = $this->get("/profesores/create");
        $response->assertStatus(200);       
    }


    public function testStoreAlumno(){
        

        $profesor = factory(Profesor::class)->make(); 
        
        $request = [
            "nombre"=>$profesor->nombre,
            "apellido"=>$profesor->apellido,
            "gmail"=>$profesor->gmail,
        ];
        
        $response = $this->post("/profesores",$request);
        $response->assertRedirect("/profesores");

        $this->assertDatabaseHas('profesores',[
            'nombre'=> $profesor->nombre,
            'apellido'=>$profesor->apellido,
            'gmail'=>$profesor->gmail,
        ]);
    }
    
    public function testEdit(){

        $profesor = factory(Profesor::class)->create();

        $response = $this->get("/profesores/{$profesor->id}/edit");
        $response->assertStatus(200)
            ->assertSee($profesor->id)
            ->assertSee($profesor->nombre)
            ->assertSee($profesor->gmail);        
    }

    public function testUpdate(){

        $profesor = factory(Profesor::class)->create(); 

        $request = [
            "nombre"=>"Cristian",
            "apellido"=>"S",
            "gmail"=>$profesor->gmail,
        ];
        
        $response = $this->put("/profesores/$profesor->id",$request);
        $response->assertRedirect("/profesores");

        $this->assertDatabaseHas('profesores',[
            'nombre'=> "Cristian",
            'apellido'=>"S",
        ]);
    }
    
    public function testShowDetalle(){

        $profesor = factory(Profesor::class)->create();

        $response = $this->get("/profesores/{$profesor->id}");
        $response->assertStatus(200)
            ->assertSee($profesor->nombre)
            ->assertSee($profesor->gmail);      
    }

    public function testDestroyEliminar(){
        
        $profesor = factory(Profesor::class)->create(); 
        $response = $this->delete("/profesores/$profesor->id");
        $response->assertRedirect("/profesores");

        $this->assertDatabaseMissing('profesores',[
            'id'=>$profesor->id
        ]);
    }

    public function testSearchPorApellidosYNombres(){

        $profesor = factory(Profesor::class)->create();

        $response = $this->get("/profesores/search?buscar={$profesor->nombre}");
        $response->assertStatus(200)
            ->assertSee($profesor->nombre);
    }

    public function testSearchPorApellidosYNombresSinResultados(){

        $buscar = "dasd";
        $response = $this->get("/profesores/search?buscar={$buscar}");
        $response->assertStatus(200)
        ->assertSee('No se obtuvieron resultados');
    }
    
}
