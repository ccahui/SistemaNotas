<div>
    <p>
        <strong>Curso: {{ $curso->nombre }}</strong>
    </p>
    <p>
        Grado y Seccion: {{ $salon->grado->nombre }} {{ $salon->seccion }}
    </p>
    <p>
            Docente: {{ $profesor->nombre }} {{ $profesor->apellido }}
    </p>
</div>
<table>
    <thead>
    <tr>   
        
        <th>Nro</th>
        <th>id</th>
        <th>Apellidos y Nombres</th>
        <th>Nota 1</th>
        <th>Nota 2</th>
        <th>Nota 3</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $alumno->pivot->id }}</td>
            <td style="width: 40px">{{ $alumno->apellido }} {{ $alumno->nombre }}</td>
            <td>{{ $alumno->pivot->notas1 }}</td>
            <td>{{ $alumno->pivot->notas2 }}</td>
            <td>{{ $alumno->pivot->notas3 }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
