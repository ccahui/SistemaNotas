<?php

namespace App\Exports;

use App\Models\Alumno;
use App\Models\Profesor;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    private $profesor;
    private $alumnos;
    private $salon;
    private $curso;

    public function __construct($profesor,$alumnos,$salon,$curso){
        $this->profesor = $profesor;
        $this->alumnos = $alumnos;
        $this->salon = $salon;
        $this->curso = $curso;
        //dd('hola mundo');
    }

    public function view(): View
    {
        $data = [
            'profesor' => $this->profesor,
            'curso' =>  $this->curso,
            'salon'=> $this->salon,
            'alumnos' => $this->alumnos, 
        ];
        
        return view('exports.notas', $data);
    
    }

}
