<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\Salon;

class NotasController extends Controller
{
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        $cursos = $alumno->cursos;
        $salon = $alumno->salon;
        $data = [
            'alumno'=>$alumno,
            'cursos'=>$cursos,
            'titulo'=>'Visualizar Nota Alumno',
            'salon'=>$salon,
        ];
        return view('notas/show', $data);
    }

    public function showNotasProfesor($id){
       
        $profesor = Profesor::findOrFail($id);
        $cursosSalones = $this-> obtenerSalonesPorCadaCurso();
        $data = [
            'titulo' => 'Registro de Notas',
            'profesor' => $profesor,
            'cursosSalones' => $cursosSalones, 
        ];

        return view('notas/showNotasProfesor',$data);
    }
    
    public function showNotasProfesorDetalle(Request $request, $id){
    
        $idCurso = $request->query('curso');
        $idSalon = $request->query('salon');


        $profesor = Profesor::findOrFail($id);
        $curso = Curso::findOrFail($idCurso);
        $salon = Salon::findOrFail($idSalon);



        $alumnos = $this-> obtenerAlumnosDeUnSalonYUnCurso($curso, $salon);
        $data = [
            'titulo' => 'Registro de Notas',
            'profesor' => $profesor,
            'curso' => $curso,
            'salon'=> $salon,
            'alumnos' => $alumnos, 
        ];

        return view('notas/showNotasProfesorDetalle',$data);
    }


    public function obtenerSalonesPorCadaCurso(){

        $profesor = Profesor::all()->first();
        $cursos_unicos = $profesor->cursos->unique();
        $arrayes = array();
        foreach($cursos_unicos as $curso){
            $salones = $curso->salones()->where('profesor_id',$profesor->id)->get();
            $array = array(
                'curso'=>$curso,
                'salones'=>$salones
            );
            array_push($arrayes, $array);
        }
        return $arrayes;
}
public function obtenerAlumnosDeUnSalonYUnCurso($curso, $salon){
    
    $alumnos = $curso->alumnos()->where('salon_id',$salon->id)->get();

    return $alumnos;
}
}
