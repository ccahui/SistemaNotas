@extends('layout')

@section('title', "$titulo")

@section('content')


     
      
<h5>{{$titulo}}</h5>    


<div class="row">
    <div>{{$salon->grado->nombre}} - {{$salon->seccion}}</div>
    <div>{{$alumno->nombre}}</div>
<div>{{$alumno->apellido}}</div>

<ul>
@foreach ($cursos as $curso)
<li>{{$curso->nombre}}</li> 
<li>{{$curso->pivot->notas1}}</li>
<li>{{$curso->pivot->notas2}}</li>
<li>{{$curso->pivot->notas3}}</li>  
@endforeach
</ul>
<a href="{{url("/cursos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    