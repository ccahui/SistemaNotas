@extends('layout2')

@section('title', "$titulo")

@section('content')

<h5>{{$titulo}}</h5>    


<div class="row">
        <div>
                <span class="font-weight-bold">Apellidos y Nombres: </span> {{$profesor->apellido}} {{$profesor->nombre}}
        </div>
<div>

    <div class="row">
        <div class="col s8">
                <table>
                        <thead>
                          <tr>
                              <th>Curso</th>
                              <th>Salones</th>
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
       
                    
    
      
            
            




<br>

<a href="{{url("/cursos")}}" class="btn"><i class='material-icons left'>arrow_back</i>Regresar</a>
</div>
@endsection
    