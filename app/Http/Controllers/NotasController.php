<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\Salon;
use App\Models\Nota;

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
        $cursosSalones = $this-> obtenerSalonesQueDicto($profesor);
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

    public function storeNotas(Request $request){
        $notas1 = $request->input('notas1');
        $notas2 = $request->input('notas2');
        $notas3 = $request->input('notas3');

        $notas_ids = $request->input('notas_ids');

        for($i = 0; $i < count($notas1) ; $i++){
            Nota::where('id',$notas_ids[$i])->update(
               ['notas1'=>$notas1[$i],
               'notas2'=>$notas2[$i],
               'notas3'=>$notas3[$i]]);
        }
        $url = redirect()->getUrlGenerator()->previous();
        
        return redirect($url);

    }

    public function obtenerSalonesQueDicto($profesor){

        // $profesor = Profesor::all()->first();
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
