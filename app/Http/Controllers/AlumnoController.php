<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alumno;
use App\Models\Salon;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $data = [
            'alumnos'=>$alumnos,
            'titulo'=>'Listado de Alumnos',
        ];
        return view('alumnos/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salones = Salon::all();
        $data = [
            'salones'=>$salones,
            'titulo'=>'Crear Alumno'
        ];
        return view('alumnos/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'salon_id'=>'required',
            'gmail'=>'required|email|unique:alumnos',
        ]);

        $data = request()->all();
        $alumno = Alumno::create($data);
        return redirect("/alumnos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $grado= $alumno->salon->grado;
        $salones = $grado->salones;
        $data = [
            'titulo'=>'Editar Alumno',
            'alumno'=>$alumno,
            'salones'=>$salones,
        ];
        return view('alumnos/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);

        /* TODO */
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'salon_id'=>'required',
            'gmail'=>'required|unique:alumnos,gmail,'.$alumno->id,
        ]);
        $data = $request->all();
        $alumno->update($data);
        return redirect("/alumnos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
