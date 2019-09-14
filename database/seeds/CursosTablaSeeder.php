<?php

use Illuminate\Database\Seeder;
use App\Models\Grado;
use App\Models\Curso;

class CursosTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = Grado::all();
        foreach($grados as $grado){
            Curso::create([
                'nombre' => 'Matematica',
                'grado_id' => $grado->id,
            ]);
            Curso::create([
                'nombre' => 'Comunicacion',
                'grado_id' => $grado->id,
            ]);

            Curso::create([
                'nombre' => 'Lenguaje',
                'grado_id' => $grado->id,
            ]);
            Curso::create([
                'nombre' => 'CTA',
                'grado_id' => $grado->id,
            ]);
        }
    }
}
