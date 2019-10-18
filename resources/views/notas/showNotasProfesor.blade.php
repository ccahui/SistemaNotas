@extends('layout2')

@section('title', "$titulo")

@section('content')

    
<div class="row card-panel">
    <span class="font-weight-bold">REGISTRAR NOTAS</span>
    <p>       <span class="font-weight-bold">Docente: </span> {{$profesor->apellido}} {{$profesor->nombre}}</p>
         
       
<div>

    <div class="row">
        <div class="col s8">
                <table>
                        <thead>
                          <tr>
                              <th>Mis Cursos</th>
                              <th>Secciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            
        
                        @foreach($cursosSalones as $cursoSalones)
                        <tr>
                            <td> {{ $cursoSalones['curso']->nombre}} </td>
                            
                            <td>
                                    @foreach ($cursoSalones['salones'] as $salon)            
                                    <span class="ml-1">
                                    <a href="{{url("/notas/profesor/$profesor->id/detalle?curso={$cursoSalones['curso']->id}&salon={$salon->id}")}}" class="btn">{{$salon->seccion}}</a>     
                                    </span>  
                                    @endforeach
                            </td>
                             
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

    </div>
       
                    
    
      
            
            



</div>
@endsection
    