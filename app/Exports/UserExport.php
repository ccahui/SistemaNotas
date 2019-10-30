<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Alumno;
use App\Models\Profesor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Support\Responsable;
class UserExport implements FromView, Responsable

{

    use Exportable;

    private $fileName = 'notas.xlsx';
    private $profesor;
    private $alumnos;
    private $salon;
    private $curso;

    public function __construct($profesor,$alumnos,$salon,$curso){
        $this->profesor = $profesor;
        $this->alumnos = $alumnos;
        $this->salon = $salon;
        $this->curso = $curso;
        $this->definirNombreDelArchivo();
    }

    private function definirNombreDelArchivo(){
        $this->fileName = $this->curso->nombre."_".$this->salon->grado->id."-".$this->salon->seccion.".xlsx";
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
