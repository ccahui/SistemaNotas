<table>
    <thead>
      <tr>
          <th>Grado</th>
          <th>Sección</th>
          <th>Operaciones</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($salones as $salon)
        <tr>
            <td>{{$salon->grado->nombre }}</td>
            <td>{{$salon->seccion }} </td>
            <td>
                <a href="{{ url("/salones/{$salon->id}") }}" class="btn-small "><i class="material-icons">remove_red_eye</i></a>
                <a href="{{ url("/salones/{$salon->id}/edit") }}" class="btn-small blue"><i class="material-icons">edit</i></a>

                
            <form method="post" action="{{ url("/salones/{$salon->id}")}}" style="display:inline-block">
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