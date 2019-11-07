@extends('layout')

@section('title', "$titulo")
@section('content')
<h5>{{$titulo}}</h5>

<div class="row">
  <div class="">
    <ul class="tabs">

      @foreach ($grados as $grado)
      <li class="tab col"><a href="#{{$grado->id}}">{{$grado->nombre}}</a></li>
      @endforeach

    </ul>
  </div>
</div>
<div>

  <form action="{{url("/profesores/asignarCurso")}}" method="post">
      {{ csrf_field() }}
      <input name="profesor_id" hidden type="text" value="{{$profesor->id}}">

      <div class="row">
    @foreach ($grados as $grado)
    <div id="{{$grado->id}}" class="col ">
      <table>
        <thead>
          <tr>
            <th>Curso</th>
            <th>Secciones</th>
          </tr>
        </thead>
        @foreach ($grado->cursos as $curso)

        <tr>
          <td> {{$curso->nombre}} </td>
          <td>
            @foreach ($curso->salones as $salon)


            <label class="mx-2">
            <input type="checkbox" name="malla_ids[]"  value="{{$salon->pivot->id}}" class="filled-in" />
              <span>{{$salon->seccion}}</span>
            </label>



            @endforeach

          </td>
        </tr>
        @endforeach
        <tbody>
        </tbody>
      </table>





    </div>
    @endforeach
  </div>
  <div class="">
    <button type="submit" class="btn blue">Guardar Cambios</button>
  <a href="{{url("/profesores/asignarCurso")}}" class="btn ">Cancelar</a>
  </div>
  </form>
</div>


@endsection