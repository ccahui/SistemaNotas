<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Salon;
use App\Models\Grado;
class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salones = Salon::all();
        $data = [
            'salones'=>$salones,
            'titulo'=>'Listado de Salones',
        ];
        return view('salones/index',$data);
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
            'titulo'=>'Crear Salon'
        ];
        return view('salones/create', $data);
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
            'seccion'=>'required',
            'grado_id'=>'required',
        ]);

        $data = request()->all();
        Salon::create($data);
        return redirect("/salones");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salon = Salon::findOrFail($id);
        $data = [
            'salon'=>$salon,
            'titulo'=>'Salon'
        ];
        return view('salones/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salon = Salon::findOrFail($id);
        $grados= Grado::all();

        $data = [
            'titulo'=>'Editar Salon',
            'salon'=>$salon,
            'grados'=>$grados,
        ];
        return view('salones/edit', $data);
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
        $salon = Salon::findOrFail($id);

        /* TODO */
        $request->validate([
            'seccion'=>'required',
            'grado_id'=>'required',
        ]);

        $data = $request->all();
        $salon->update($data);
        return redirect("/salones");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Salon::destroy($id);
        return redirect("/salones");

    }
}
