@extends('layout')

@section('title', "$titulo")
@section('content')
  <h5>{{$titulo}}</h5> 
  
  <div class="row">
      <div class="">
        <ul class="tabs" >

          @foreach ($grados as $grado)
        <li class="tab col"><a href="#{{$grado->id}}">{{$grado->nombre}}</a></li>     
          @endforeach
         
        </ul>
      </div>
      
      @foreach ($grados as $grado)
    <div id="{{$grado->id}}" class="col ">
      @foreach ($grado->cursos as $curso)

          <input type="checkbox" name="">           {{$curso->nombre}} <br>
      @endforeach
    </div>    
      @endforeach
      
    
    
    </div>
@endsection
    