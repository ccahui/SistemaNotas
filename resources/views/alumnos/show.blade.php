@extends('layout')

@section('title', "$titulo")

@section('content')


     
      
<h5>{{$titulo}}</h5>    


<div class="row">
<div>{{$alumno->nombre}}</div>
<div>{{$alumno->salon->grado->nombre}}</div>
<div>{{$alumno->salon->seccion}}</div>
<div>{{$alumno->gmail}}</div>
<a href="{{url("/alumnos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    