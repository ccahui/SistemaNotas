@extends('layout2')

@section('title', "$titulo")

@section('content')

<h5>{{$titulo}}</h5>    


<div class="row">
        <div>
                <span class="font-weight-bold">Apellidos y Nombres: </span> {{$profesor->apellido}} {{$profesor->nombre}}
        </div>
        <div>
                <span class="font-weight-bold">CURSO: </span> {{$curso->nombre}} 
        </div>
        <div>
                <span class="font-weight-bold">GRADO: </span> {{$salon->grado->nombre}} 
        </div>
        <div>
                <span class="font-weight-bold">SECCION: </span> {{$salon->seccion}} 
        </div>
<div>

    
                <table>
                        <thead>
                          <tr>
                              <th>Apellidos y Nombre</th>
                              <th>Nota 1 </th>
                              <th>Nota 2 </th>
                              <th>Nota 3 </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($alumnos as $alumno)
                          <tr>
                          <td>{{$alumno->apellido}} {{$alumno->nombre}}</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          </tr>
                          @endforeach  

                     
                    </tbody>
                </table>
        
       
                    
    
      
            
            




<br>

<a href="{{url("/cursos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    