<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> eliminarDatosDeLasTablas([
            'grados',
            'salones',
            'cursos',
            'profesores',
            'alumnos',
            'salon_curso_profesor',
            'notas',
            'users'
        ]);

        $this->call(GradosTablaSeeder::class);
        $this->call(SalonesTablaSeeder::class);
        $this->call(CursosTablaSeeder::class);
        $this->call(ProfesorTablaSeeder::class);
        $this->call(AlumnoTablaSeeder::class);
        $this->call(PivotCursoSalonTablaSeeder::class);
        $this->call(NotasTableSeeder::class);
        $this->call(DataInicialSeeder::class);
        
    }

    private function eliminarDatosDeLasTablas(array $tablas){
        $this-> desabilitarRevisionForeignKey();
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        $this-> habilitarRevisionForeignKey();
    }
   
    private function desabilitarRevisionForeignKey(){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
        
    private function habilitarRevisionForeignKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
