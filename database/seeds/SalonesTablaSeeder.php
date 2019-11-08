<?php

use Illuminate\Database\Seeder;
use App\Models\Salon;
use App\Models\Grado;
class SalonesTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->crearSalonDeLosGrados();
    }
    
    private function crearSalonDeLosGrados(){
        $grados = Grado::all();
        foreach($grados as $grado){
            $grado->salones()->createMany([
                ['seccion'=> "A"],
                ['seccion'=> "B"],
             ]);
        }
    }

}
