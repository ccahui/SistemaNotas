<table>
    <thead>
      <tr>
          <th>Curso</th>
          <th>Trimestre 1</th>
          <th>Trimestre 2</th>
          <th>Trimestre 3</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($cursos as $curso)
            
            
            <tr>
                
            <td rowspan="3">{{$curso->nombre}}</td>
            <td>{{$curso->pivot->notas1}}</td>
            <td>{{$curso->pivot->notas2}}</td>
            <td>{{$curso->pivot->notas3}}</td>  
            </tr>
            <tr>
                    
                    <td>{{$curso->pivot->notas1}}</td>
                    <td>{{$curso->pivot->notas2}}</td>
                    <td>{{$curso->pivot->notas3}}</td>  
                    </tr>
                    <tr class="blue-text text-darken-2" style="font-weight: bold" >
                 
                            <td>{{$curso->pivot->notas1}}</td>
                            <td>{{$curso->pivot->notas2}}</td>
                            <td>{{$curso->pivot->notas3}}</td>  
                            </tr>

                            
        @endforeach            
    </tbody>
</table>