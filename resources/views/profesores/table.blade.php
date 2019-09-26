<table>
    <thead>
      <tr>
          <th>Apellidos y Nombres</th>
          <th>Gmail</th>
          <th>Operaciones</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($profesores as $profesor)
        <tr>
            <td>{{$profesor->apellido }} {{$profesor->nombre }} </td>
            <td>{{$profesor->gmail}}</td>
            <td>
                <a href="{{ url("/profesores/{$profesor->id}") }}" class="btn-small "><i class="material-icons">remove_red_eye</i></a>
                <a href="{{ url("/profesores/{$profesor->id}/edit") }}" class="btn-small blue"><i class="material-icons">edit</i></a>

            <form method="post" action="{{ url("/profesores/{$profesor->id}")}}" style="display:inline-block">
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