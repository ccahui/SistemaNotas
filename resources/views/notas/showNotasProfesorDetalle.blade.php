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

      <div class="right-align row card-panel">

                <a href="{{url("/exportarNotas/profesor/{$profesor->id}?curso={$curso->id}&salon={$salon->id}")}}" class="btn"><i class="material-icons left">cloud_download</i> Exportar Excel</a>
             
                <a class="btn modal-trigger red blue" href="#modal1">Enviar Comunicado</a>
                
        <div  class="col 6 " style="display: inline-block">
                
                
                <form action={{url("/importarNotas/profesor/$profesor->id")}} method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                        <div class="file-field input-field">
                                                <div class="btn">
                                                  <span>Importar Excel<i class="material-icons left">cloud_upload</i></span>
                                                  <input type="file" name="notas" accept=".xls, .xlsx">
                                                </div>
                                                <div class="file-path-wrapper">
                                                  <input class="file-path validate" type="text">
                                                  
                                                </div>

                                        </div>
                                              <input type="submit" >
                                             
                                        </form>
                
        </div>
        
      
        
        
        
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
    