<div class="row">
    <div class="input-field col s6">

    <input name="nombre" type="text"  value="{{old('nombre',$alumno->nombre)}}">
      <label for="nombre">Nombres</label>
      
    </div>
    <div class="input-field col s6">
    <input  type="text" name="apellido"  value="{{old('apellido',$alumno->apellido)}}">
      <label for="last_name">Apellidos</label>

    </div>
</div>

  <div class="row">
    <div class="input-field col s6">
    <select name="salon_id">
          <option value="" disabled selected>Choose your option</option>
          @foreach ($salones as $salon)
            <option value="{{$salon->id}}" {{ (old("salon_id", $alumno->salon->id) == $salon->id ? "selected":"") }} >{{$salon->grado->numero."-".$salon->seccion}}</option>
          @endforeach
          
      </select>
      <label>Sección</label>
    
    
    </div>
    <div class="input-field col s6">
      <input placeholder="nombre@gmail.com" type="email" name="gmail"  value="{{old('gmail', $alumno->gmail)}}">
        <label>Gmail</label>
      </div>
  </div>
   