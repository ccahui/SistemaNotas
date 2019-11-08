<?php

use Illuminate\Database\Seeder;
use App\Models\Grado;
class GradosTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertarGradosDeColegio();
    }

    private function insertarGradosDeColegio() {
        
        Grado::create([
            'numero' => '1',
            'nombre' => 'Primer Grado',
        ]);
        Grado::create([
            'numero' => '2',
            'nombre' => 'Segundo Grado',
        ]);
        Grado::create([
            'numero' => '3',
            'nombre' => 'Tercer Grado',
        ]);
        Grado::create([
            'numero' => '4',
            'nombre' => 'Cuarto Grado',
        ]);
        Grado::create([
            'numero' => '5',
            'nombre' => 'Quinto Grado',
        ]);   
    }
}
