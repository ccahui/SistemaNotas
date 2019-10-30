<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\NotasImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function notas(Request $request, $idProfesor){

        if($request->file('notas')->isValid()){
            $fileNotas = $request->file('notas');

            Excel::import(new NotasImport, $fileNotas);
        } else {
            dd("UPS LO SENTIMOS ERROR");
        }
    }
}
