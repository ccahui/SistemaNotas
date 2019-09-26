<div class="row">
  <div class="input-field col s6">
  <select name="grado_id">
        <option value="" disabled selected>Choose your option</option>
        @foreach ($grados as $grado)
          <option value="{{$grado->id}}" {{ (old("grado_id", $salon->grado->id) == $grado->id ? "selected":"") }} >{{$grado->numero."-".$grado->nombre}}</option>
        @endforeach
        
    </select>
    <label>Grado</label>
  
  
  </div>
</div>

<div class="row">
    <div class="input-field col s6">

    <input name="seccion" type="text"  value="{{old('seccion',$salon->seccion)}}">
      <label for="seccion">Seccion</label>
      
    </div>
  
</div>

 
   