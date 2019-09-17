<?php

use Illuminate\Database\Seeder;
use App\Models\Profesor;

class ProfesorTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this -> insertarProfesores(2);
    }

    private function insertarProfesores($cantidad) {
        factory(Profesor::class, $cantidad)->create();
    }

}
