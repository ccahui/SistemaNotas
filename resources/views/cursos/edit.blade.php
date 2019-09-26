@extends('layout')

@section('title', "$titulo")

@section('content')

@if ($errors->any())
<ul>
  @foreach ($errors->all() as $error)
    <li class="red-text">{{$error}}</li>
  @endforeach

  </ul>    
@endif
     
      
<h5>{{$titulo}}</h5>    


<div class="row">
<form class="col s12" method="post" action="{{ url("/cursos/$curso->id")}}">
  {{ method_field('PUT')}}
  {{ csrf_field() }}
   
  @include('cursos/fieldsEdit')

    
    <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
        <i class="material-icons right">send</i>
      </button>
    
    
      <a href="{{url("/cursos")}}" class="btn">Cancelar</a>
      
      
    </form>
  </div>
@endsection
    