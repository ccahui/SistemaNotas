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
            

                        <tr>
                            <td  >{{$curso->nombre}}</td>     
                            <td class="blue-text text-darken-2" style="font-weight: bold" >{{$curso->pivot->notas1}}</td>
                            <td class="blue-text text-darken-2" style="font-weight: bold" >{{$curso->pivot->notas2}}</td>
                            <td class="blue-text text-darken-2" style="font-weight: bold" >{{$curso->pivot->notas3}}</td>  

                            <td class="blue-text text-darken-2" style="font-weight: bold" ></td>  
                        </tr>

                            
        @endforeach            
    </tbody>
</table>