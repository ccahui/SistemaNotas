<table>
    <thead>
      <tr>
          <th>Nombre</th>
          <th>Grado</th>
          <th>Operaciones</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($cursos as $curso)
        <tr>
            <td>{{$curso->nombre }} </td>
            <td>{{$curso->grado->nombre }}</td>
            <td>
                <a href="{{ url("/cursos/{$curso->id}") }}" class="btn-small "><i class="material-icons">remove_red_eye</i></a>
                <a href="{{ url("/cursos/{$curso->id}/edit") }}" class="btn-small blue"><i class="material-icons">edit</i></a>

                
            <form method="post" action="{{ url("/cursos/{$curso->id}")}}" style="display:inline-block">
                @csrf
                {{ method_field("DELETE")}}
                <button type="submit" value="Eliminar" class="btn-small red" onclick="return confirm('Estas Seguro de eliminar?')"><i class="material-icons" >delete</i></button>
            </form>
            
            </td>
        </tr>
        @empty
            <tr>
              <td colspan="4" class="center-align">No se obtuvieron resultados</td>
            </tr>
        @endforelse
    
    </tbody>
  </table>