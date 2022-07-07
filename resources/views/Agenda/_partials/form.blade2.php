
<div class="container">
  <div class="row col-10 mx-auto">
          @csrf
          <input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" class="form-control" placeholder="ID do User">
          <div class="row col-8 mx-auto"> 
                <div class="col-12">
                  <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Evento - marcação de consulta">
                    <!-- <input type="text" value="{{-- $paciente->id ?? old('id') --}}" name="id" class="form-control"> -->
                  </div>
                </div>      
              </div>  

              <div class="row col-8 mx-auto">
                  <div class="col-4">     
                    <div class="form-group">
                        <input type="date"  name="start" id="start" class="form-control" placeholder="Data de marcação">
                    </div>
                  </div> 

                  <div class="col-4"> 
                    <div class="form-group">
                        <input type="date"  name="end" id="end" class="form-control" placeholder="Hora de inicio">
                    </div>
                  </div>  
                  <div class="col-4">
                    <div class="form-group">
                        <input type="color"  name="color" id="color" class="form-control" placeholder="Cor de marcação">
                        <!-- <input type="time" name="horaFim" id="horaFim" class="form-control" placeholder="Hora fe fim"> -->
                    </div>
                  </div>  
              </div>
              <!--
              <div class="row col-8 mx-auto"> 
                <div class="col-12">     
                  <div class="form-group">
                      <input type="color"  name="cor" id="cor" class="form-control" placeholder="Cor de marcação">
                  </div>
                </div> 
              </div>
            -->
              <div class="row col-8 mx-auto"> 
                <div class="col-12">     
                  <div class="form-group">
                    <textarea name="descricao" id="descricao" cols="30" rows="3" class="form-control" placeholder="Observação"></textarea>
                      
                  </div>
                </div> 
              </div>

              <div class="row col-8 mx-auto">  
                <div class="form-group">
                  <a href="{{ route('agenda.index') }}" class="btn btn-secondary btn-sm mx-2">
                      <i class="fas fa-window-close"></i> Cancelar  </a>
                  <button type="submit" class="btn btn-primary btn-sm"> 
                    <i class="fas fa-save"></i> Gravar </button>
                </div>
              </div>
    </div>
</div>

