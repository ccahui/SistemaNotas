@extends('layout')

@section('title', "$titulo")
@section('content')
<h5 style="display:inline-block">{{$titulo}}</h5>

    <div class="row">
        @foreach ($gradosAlumnos as $gradoAlumno)
            
            <div class="col m6">
            <h6>{{$gradoAlumno['grado']->nombre}}</h6>
                    <table class="card-panel">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Apellidos  y nombres</th>
                                <th>Puntaje</th>
                            </tr>
                            </thead>
                        
                            <tbody>
                                
                                @foreach ($gradoAlumno['alumnos'] as $alumno)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$alumno->apellido}} {{$alumno->nombre}}</td>
                                    <td>90</td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

            </div>
        @endforeach
        
    </div>

@endsection