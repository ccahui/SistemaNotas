<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Salon;
use App\Models\Grado;

class SalonTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexListado()
    {
        $salon = factory(Salon::class)->create();

        $response = $this->get("/salones");
        $response->assertStatus(200)
            ->assertSee($salon->seccion)
            ->assertSee($salon->grado->nombre);
    }

    public function testIndexSinSalones()
    {
        $response = $this->get("/salones");
        $response->assertStatus(200)
            ->assertSee('No se obtuvieron resultados');
    }

    public function testCreate(){
        $grado = factory(Grado::class)->create();

        $response = $this->get("/salones/create");
        $response->assertStatus(200)
            ->assertSee($grado->id)
            ->assertSee($grado->nombre);        
    }

    public function testStoreAlumno(){
        
        $grado = factory(Grado::class)->create(); 

        $salon = factory(Salon::class)->make([ 
            'grado_id'=>$grado->id,
        ]); 
        
        $request = [
            "seccion"=>$salon->seccion,
            "grado_id"=>$grado->id,
        ];
        
        $response = $this->post("/salones",$request);
        $response->assertRedirect("/salones");

        $this->assertDatabaseHas('salones',[
            'seccion'=> $salon->seccion,
            'grado_id'=>$salon->grado_id,
        ]);
    }

    public function testEdit(){

        $salon = factory(Salon::class)->create();
        $grado = $salon->grado;

        $response = $this->get("/salones/{$salon->id}/edit");
        $response->assertStatus(200)
            ->assertSee($grado->id)
            ->assertSee($grado->seccion);        
    }

    public function testUpdate(){

        $salon = factory(Salon::class)->create(); 

        $request = [
            "seccion"=>"A",
            "grado_id"=>$salon->grado->id,
        ];
        
        $response = $this->put("/salones/$salon->id",$request);
        $response->assertRedirect("/salones");

        $this->assertDatabaseHas('salones',[
            'seccion'=> "A",
            'grado_id'=>$salon->grado->id,
        ]);
    }
    
    public function testShowDetalle(){

        $salon = factory(Salon::class)->create();
        $grado = $salon->grado;

        $response = $this->get("/salones/{$salon->id}");
        $response->assertStatus(200)
            ->assertSee($salon->seccion)
            ->assertSee($grado->nombre);      
    }

    public function testDestroyEliminar(){
        
        $salon = factory(Salon::class)->create(); 
        
        $response = $this->delete("/salones/$salon->id");
        $response->assertRedirect("/salones");

        $this->assertDatabaseMissing('salones',[
            'id'=>$salon->id
        ]);
    }
}
