<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Alumno;
use App\Models\Salon;

class AlumnoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexListadoAlumnos()
    {
        $alumno = factory(Alumno::class)->create();

        $response = $this->get("/alumnos");
        $response->assertStatus(200)
            ->assertSee($alumno->nombre)
            ->assertSee($alumno->salon->seccion)
            ->assertSee($alumno->salon->grado->nombre);
    }

    public function testIndexSinAlumnos()
    {
        $response = $this->get("/alumnos");
        $response->assertStatus(200)
            ->assertSee('No hay Alumnos Registrados');
    }

    public function testCreate(){
        $salon = factory(Salon::class)->create();

        $response = $this->get("/alumnos/create");
        $response->assertStatus(200)
            ->assertSee($salon->id)
            ->assertSee($salon->grado->numero)
            ->assertSee($salon->seccion);        
    }

    public function testStoreAlumno(){
        
        $salon = factory(Salon::class)->create(); 

        $alumno = factory(Alumno::class)->make([ 
            'salon_id'=>$salon->id,
        ]); 
        
        $request = [
            "nombre"=>$alumno->nombre,
            "apellido"=>$alumno->apellido,
            "salon_id"=>$alumno->salon_id,
            "gmail"=>$alumno->gmail,
        ];
        
        $response = $this->post("/alumnos",$request);
        $response->assertRedirect("/alumnos");

        $this->assertDatabaseHas('alumnos',[
            'nombre'=> $alumno->nombre,
            'salon_id'=>$alumno->salon_id,
        ]);
    }

    public function testEdit(){

        $alumno = factory(Alumno::class)->create();
        $salon = $alumno->salon;

        $response = $this->get("/alumnos/{$alumno->id}/edit");
        $response->assertStatus(200)
            ->assertSee($salon->id)
            ->assertSee($salon->grado->numero)
            ->assertSee($salon->seccion);        
    }

    public function testUpdate(){

        $alumno = factory(Alumno::class)->create(); 

        $request = [
            "nombre"=>"Cristian",
            "apellido"=>"S",
            "salon_id"=>$alumno->salon_id,
            "gmail"=>$alumno->gmail,
        ];
        
        $response = $this->put("/alumnos/$alumno->id",$request);
        $response->assertRedirect("/alumnos");

        $this->assertDatabaseHas('alumnos',[
            'nombre'=> "Cristian",
            'apellido'=>"S",
        ]);
    }
    




}
