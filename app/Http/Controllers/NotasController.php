<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Alumno;

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
}
