<table>
    <thead>
      <tr>
          <th>Alumnos</th>
          <th>Nota 1 </th>
          <th>Nota 2 </th>
          <th>Nota 3 </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($alumnos as $alumno)
    <input name="notas_ids[]" value="{{$alumno->pivot->id}}" hidden>
      <tr>
      <td class="py-0">{{$alumno->apellido}} {{$alumno->nombre}}</td>
      <td class="py-0"> <input name="notas1[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" value="{{$alumno->pivot->notas1}}"></td>
      <td class="py-0"> <input name="notas2[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" value="{{$alumno->pivot->notas2}}"></td>
      <td class="py-0"> <input name="notas3[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" value="{{$alumno->pivot->notas3}}"></td>
      </tr>
      @endforeach  

 
</tbody>
</table>