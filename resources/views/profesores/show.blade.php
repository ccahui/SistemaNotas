@extends('layout')

@section('title', "$titulo")

@section('content')


      
<h5>{{$titulo}}</h5>    


<div class="row">
<div>{{$profesor->nombre}}</div>
<div>{{$profesor->apellido}}</div>
<div>{{$profesor->gmail}}</div>
<a href="{{url("/profesores")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    