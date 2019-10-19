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
<form action="{{url('/notas')}}" method="post"> 
        {{ method_field('PUT')}}
        {{ csrf_field() }}
                @include('notas/tableInsertarNotas')
                <br>
                <div class="center-align fluid">
                        <button type="submit" class="btn blue" style="width: 100%">Guardar</button> 
                </div>  
        </form>
              
              
       
                    
    
      
            
            




<br>


</div>
@endsection
    