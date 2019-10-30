<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Salon;
/*FORMULAS */
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

use Maatwebsite\Excel\Facades\Excel;

class ExportNotasController extends Controller
{
    
    //
    public function exportNotasExcel(Request $request, $id){
        $idCurso = $request->query('curso');
        $idSalon = $request->query('salon');
        

        $profesor = Profesor::findOrFail($id);
        $curso = Curso::findOrFail($idCurso);
        $salon = Salon::findOrFail($idSalon);
        $alumnos = $this-> obtenerAlumnosDeUnSalonYUnCurso($curso, $salon);
        $exportarnotas = new UserExport($profesor,$alumnos,$salon,$curso);

        return Excel::download($exportarnotas,'notas.xlsx');;
    }

    public function obtenerAlumnosDeUnSalonYUnCurso($curso, $salon){
    
        $alumnos = $curso->alumnos()->where('salon_id',$salon->id)->get();
    
        return $alumnos;
    }
}
