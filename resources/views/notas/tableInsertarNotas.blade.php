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
    <input name="nota_id[]" value="{{$alumno->pivot->id}}" hidden>
      <tr>
      <td class="py-0">{{$alumno->apellido}} {{$alumno->nombre}}</td>
      <td class="py-0"> <input name="nota1[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" ></td>
      <td class="py-0"> <input name="nota2[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" ></td>
      <td class="py-0"> <input name="nota3[]" class="right-align input-nota" maxlength="2" onkeypress="return isNumber(event)" 
        onkeyup="this.value=validarNota(this.value)" ></td>
      </tr>
      @endforeach  

 
</tbody>
</table>