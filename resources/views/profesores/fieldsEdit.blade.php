<div class="row">
    <div class="input-field col s6">

    <input name="nombre" type="text"  value="{{old('nombre',$profesor->nombre)}}">
      <label for="nombre">Nombres</label>
      
    </div>
    <div class="input-field col s6">
    <input  type="text" name="apellido"  value="{{old('apellido',$profesor->apellido)}}">
      <label for="last_name">Apellidos</label>

    </div>
</div>

  <div class="row">
    <div class="input-field col s6">
      <input placeholder="nombre@gmail.com" type="email" name="gmail"  value="{{old('gmail', $profesor->gmail)}}">
        <label>Gmail</label>
      </div>
  </div>
   