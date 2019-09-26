@extends('layout')

@section('title', "$titulo")
@section('content')
  <h5 style="display:inline-block">{{$titulo}}</h5> 
  
      <div class="container">
        <div class="right-align">
        <a href="{{url("/salones/create")}}" class="btn-small red blue">Crear Salon<i class="material-icons left">add</i></a>
        </div>
            
     </div>
     @include('salones/table')
  
@endsection
    