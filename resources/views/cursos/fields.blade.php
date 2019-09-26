<div class="row">
    <div class="input-field col s6">

    <input name="nombre" type="text"  value="{{old('nombre')}}">
      <label for="nombre">Nombres</label>
      
    </div>
</div>

  <div class="row">
    <div class="input-field col s6">
    <select name="grado_id">
          <option value="" disabled selected>Choose your option</option>
          @foreach ($grados as $grado)
            <option value="{{$grado->id}}" {{ (old("grado_id") == $grado->id ? "selected":"") }} >{{$grado->numero."-".$grado->nombre}}</option>
          @endforeach
          
      </select>
      <label>Grado - Sección</label>
    
    
    </div>
  </div>
   