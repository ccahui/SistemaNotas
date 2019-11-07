@extends('layout')

@section('title', "$titulo")
@section('content')
  <h5 style="display:inline-block">{{$titulo}}</h5> 
  
      <div class="container">
        <div class="right-align">
        
        </div>
            
        
     </div>
     @include('profesoresAsignar/table')
  
@endsection
    