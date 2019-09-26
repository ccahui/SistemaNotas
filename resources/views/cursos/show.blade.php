@extends('layout')

@section('title', "$titulo")

@section('content')


     
      
<h5>{{$titulo}}</h5>    


<div class="row">
<div>{{$curso->nombre}}</div>
<div>{{$curso->grado->nombre}}</div>
<a href="{{url("/cursos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    