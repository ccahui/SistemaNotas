<div class="row">
    <div class="input-field col s6">

    <input name="nombre" type="text"  value="{{old('nombre')}}">
      <label for="nombre">Nombres</label>
      
    </div>
    <div class="input-field col s6">
    <input  type="text" name="apellido"  value="{{old('apellido')}}">
      <label for="last_name">Apellidos</label>
    </div>
</div>

  <div class="row">
    <div class="input-field col s6">
      <input placeholder="nombre@gmail.com" type="email" name="gmail"  value="{{old('gmail')}}">
        <label>Gmail</label>
      </div>
  </div>
   