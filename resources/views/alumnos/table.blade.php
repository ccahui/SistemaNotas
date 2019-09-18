<table>
    <thead>
      <tr>
          <th>Nombre</th>
          <th>Grado</th>
          <th>Seccion</th>
          <th>Operaciones</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($alumnos as $alumno)
        <tr>
            <td>{{$alumno->nombre }} </td>
            <td>{{$alumno->getGrado()->nombre }}</td>
            <td>{{$alumno->salon->seccion }}</td>
            <td>
                <a href="{{ url("/alumnos/{$alumno->id}") }}" class="btn-small "><i class="material-icons">remove_red_eye</i></a>
                <a href="{{ url("/alumnos/{$alumno->id}/edit") }}" class="btn-small blue"><i class="material-icons">edit</i></a>

                <a href="" class="btn-small red"><i class="material-icons">delete</i></a>
            </td>
        </tr>
        @empty
            <tr>
              <td colspan="2" class="center-align">No hay Alumnos Registrados </td>
            </tr>
        @endforelse
    
    </tbody>
  </table>