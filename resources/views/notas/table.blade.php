<table>
    <thead>
        <tr>
            <th>Curso</th>
            <th>Trimestre 1</th>
            <th>Trimestre 2</th>
            <th>Trimestre 3</th>
            <th>Promedio Final</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
        <!-- {{$promedio= round(($curso->pivot->notas1 + $curso->pivot->notas2 + $curso->pivot->notas3)/3) }} ---->

        <tr>
            <td>{{$curso->nombre}}</td>
            <td class="blue-text text-darken-2" style="font-weight: bold">{{$curso->pivot->notas1}}</td>
            <td class="blue-text text-darken-2" style="font-weight: bold">{{$curso->pivot->notas2}}</td>
            <td class="blue-text text-darken-2" style="font-weight: bold">{{$curso->pivot->notas3}}</td>

            @if ($curso->pivot->notas1 && $curso->pivot->notas2 && $curso->pivot->notas3 )
                 @if ($promedio<=10) 
                 <td class="red-text text-darken-2" style="font-weight: bold">{{ $promedio }} </td>
                 @else
                <td class="blue-text text-darken-2" style="font-weight: bold">{{ $promedio }} </td>
                 @endif
            @else
                <td></td>
            @endif


        </tr>
        @endforeach
    </tbody>
</table>