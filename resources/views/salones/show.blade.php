@extends('layout')

@section('title', "$titulo")

@section('content')


     
      
<h5>{{$titulo}}</h5>    


<div class="row">
<div>{{$salon->grado->nombre}}</div>
<div>{{$salon->seccion}}</div>
<a href="{{url("/salones")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    