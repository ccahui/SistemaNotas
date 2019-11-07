<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\Grado;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        $data = [
            'cursos'=>$cursos,
            'titulo'=>'Listado de Cursos',
        ];
        return view('cursos/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        $data = [
            'grados'=>$grados,
            'titulo'=>'Crear Curso'
        ];
        return view('cursos/create', $data);
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
            'grado_id'=>'required',
        ]);

        $data = request()->all();
        $curso = Curso::create($data);
            Curso::malla($curso);

        return redirect("/cursos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        $data = [
            'curso'=>$curso,
            'titulo'=>'Curso'
        ];
        return view('cursos/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $grados= Grado::all();

        $data = [
            'titulo'=>'Editar Curso',
            'curso'=>$curso,
            'grados'=>$grados,
        ];
        return view('cursos/edit', $data);
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
        $curso = Curso::findOrFail($id);

        /* TODO */
        $request->validate([
            'nombre'=>'required',
            'grado_id'=>'required',
        ]);

        $data = $request->all();
        $curso->update($data);
        return redirect("/cursos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect("/cursos");

    }
    public function search(Request $request){
        $buscar = $request->query('buscar');
        $cursos = [];
       
        if($buscar){
            $cursos = Curso::where('nombre', 'like', "%$buscar%")->get();
        }
       
        $data = [
            'titulo'=>'Buscar Curso',
            'buscar'=>$buscar,
            'cursos'=>$cursos
        ];

        return view('cursos/search',$data);
    }
}
