@extends('layout')

@section('title', "$titulo")

@section('content')


<h5>{{$titulo}}</h5>    


<div class="row">
        <form action="">
                <div class="input-field col s8">
                        <i class="material-icons prefix">search</i>                
                <input id="input_text" type="text" name="buscar"  value="{{$buscar}}">
                  <label for="input_text">Apellidos y Nombres</label>
                </div>
        
        </form>
            {{$buscar}}
</div>
@if ($buscar)
    <h6>Resultados Obtenidos: </h6>
    @include('alumnos/table')
@endif  
@endsection
    