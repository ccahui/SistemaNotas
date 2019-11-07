<table>
    <thead>
        <tr>
            <th>Apellidos y Nombres</th>
            <th>Nro. Cursos</th>
            <th>Operaciones</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($profesores as $profesor)
        <tr>
            <td>{{$profesor->apellido }} {{$profesor->nombre }} </td>
            <td>{{$profesor->cursos->count()}}</td>
            <td>
                <a href="{{ url("/profesores/asignarCurso/{$profesor->id}") }}" class="btn-small blue">Asignar
                    Cursos</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="center-align">No se obtuvieron resultados</td>
        </tr>
        @endforelse

    </tbody>
</table>