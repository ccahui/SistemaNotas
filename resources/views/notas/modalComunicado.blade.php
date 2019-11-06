
  
  <!-- Modal Structure -->
  <div id="modal1" class="modal left-align" tabindex="0" style="z-index: 1003; display: none; opacity: 0; top: 4%; transform: scaleX(0.8) scaleY(0.8);">
                <div class="modal-content">
                  
                        <div class="row">
                            <h5>Comunicado</h5>

                            <form method="post" action="{{url("/profesores/enviarcomunicado")}}" >
                              {{ csrf_field() }}
                                    <div class="input-field col s12">
                            
                                            <input name="asunto" type="text">
                                            <input name="idsalon" hidden type="text" value="{{$salon->id}}">
                                              <label for="asunto">Asunto</label>
                                              
                                            </div>
                                        </div>
                                        
                                          <div class="row">
                                            <div class="input-field col s12">
                                              <textarea class="materialize-textarea" placeholder="Contenido"  name="contenido"></textarea>
                                                <label>Contenido</label>
                                              </div>
                                          </div>    
                                          <div class="align-rigth">
                                                <button type="reset" class="modal-close btn-flat">Cancelar</a>
                                                    <button type="submit" class="btn-flat">Aceptar</a>
                                          </div>
                                          
                            </form>
                                
                               

                </div>
              </div>
        </div>