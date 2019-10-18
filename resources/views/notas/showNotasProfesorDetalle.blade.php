@extends('layout2')

@section('title', "$titulo")

@section('content')

<div class="row card-panel">
      <div>
        <span class="font-weight-bold ">CURSO:  {{$curso->nombre}}</span>
      <p>
                <div>
                <span class="font-weight-bold">Docente: </span> {{$profesor->apellido}} {{$profesor->nombre}}
        </div>
        
        <div>
                <span class="font-weight-bold">Grado: </span> {{$salon->grado->nombre}} 
        </div>
        <div>
                <span class="font-weight-bold">Seccion: </span> {{$salon->seccion}} 
        </div>
      </p>
      </div>

      <div class="right-align">

               
        <a class="btn modal-trigger" href="#modal1">Enviar Comunicado</a>
        <a class="dropdown-trigger btn red blue" href="#!" data-target="dropdownExcel">Hoja Excel<i class="material-icons right">arrow_drop_down</i></a>
        <!-- Dropdown Structure -->
        <ul id="dropdownExcel" class="dropdown-content">
                                
                        <li><a href="{{url("/cursos")}}" class="blue-text"><i class="material-icons left">cloud_download</i> Exportar</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a href="{{url("/cursos")}}" class="blue-text"><i class="material-icons left">cloud_upload</i> Importar</a></li>      
                                
                        
                </ul>  
         <!-- Modal Estructura-->       
        @include('notas/modalComunicado')

       
                  
                



<div>
    
                <table>
                        <thead>
                          <tr>
                              <th>Alumnos</th>
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


</div>
@endsection
    