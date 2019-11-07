<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profesor;
use App\Models\Grado;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        $data = [
            'profesores'=>$profesores,
            'titulo'=>'Listado de Profesores',
        ];
        return view('profesores/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'titulo'=>'Crear Profesor'
        ];
        return view("profesores/create",$data);
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
            'gmail'=>'required|email|unique:profesores',
        ]);

        $data = request()->all();
        Profesor::create($data);
        return redirect("/profesores");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Profesor::findOrFail($id);
        $data = [
            'profesor'=>$profesor,
            'titulo'=>'Profesor'
        ];
        return view('profesores/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        $data = [
            'titulo'=>'Editar Profesor',
            'profesor'=>$profesor,
        ];
        return view('profesores/edit', $data);
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
        $profesor = Profesor::findOrFail($id);

        /* TODO */
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'gmail'=>'required|unique:profesores,gmail,'.$profesor->id,
        ]);
        $data = $request->all();
        $profesor->update($data);
        return redirect("/profesores");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::destroy($id);
        return redirect("/profesores");
    }

    public function search(Request $request){
        $buscar = $request->query('buscar');
        $profesores = [];
       
        if($buscar){
            $profesores = Profesor::where('apellido', 'like', "%$buscar%")
            ->orWhere('nombre', 'like', "%$buscar%")
            ->get();
        }
       
        $data = [
            'titulo'=>'Buscar Profesor',
            'buscar'=>$buscar,
            'profesores'=>$profesores
        ];

        return view('profesores/search',$data);
    }

    public function asignarCurso(){
        $profesores = Profesor::all();
        $data = [
            'profesores'=>$profesores,
            'titulo'=>'Asignar Curso Profesor',
        ];
        return view('profesoresAsignar/index',$data);
    }
    public function asignarDetalle(Request $request, $id){
       $grados = Grado::all();
      
       $data = [
           "grados"=>$grados,
           "titulo"=>"Asignar Profesor"
       ];
       
     return view('profesoresAsignar/detalle',$data);
    }
}
