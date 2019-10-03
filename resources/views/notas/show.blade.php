@extends('layout2')

@section('title', "$titulo")

@section('content')

<h5>{{$titulo}}</h5>    


<div class="row">
        <div>
                <span class="font-weight-bold">Apellidos y Nombres: </span> {{$alumno->apellido}} {{$alumno->nombre}}
        </div>
    
    <div>
        <span class="font-weight-bold">Grado: </span> {{$salon->grado->nombre}} - {{$salon->seccion}}
        </div>
 
 <br>
@include('notas/table')

<a href="{{url("/cursos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    