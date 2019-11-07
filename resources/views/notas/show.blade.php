@extends('layout3')

@section('title', "$titulo")

@section('content')

<br>
<div class="row card-panel">
        <span class="font-weight-bold">MIS NOTAS</span>
        <p>
                <div>
                        <span class="font-weight-bold">Apellidos y Nombres: </span> {{$alumno->apellido}}
                        {{$alumno->nombre}}
                </div>
                <div>
                        <span class="font-weight-bold">Grado: </span> {{$salon->grado->nombre}} - {{$salon->seccion}}
                </div>
        </p>
        <br>
        @include('notas/table')

</div>
@endsection