
<div class="container">

      @csrf
      <input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" >
      <!-- <input type="hidden" name="id" > -->
      <div class="row col-8 mx-auto">
        <div class="col-12">
          <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Evento - marcação de consulta">
          </div>
        </div>      
      </div>

      <div class="row col-8 mx-auto">
          <div class="col-6">     
            <div class="form-group">
                <input type="datetime-local"  name="start" id="start" class="form-control date-time" placeholder="Data/Hora Inicio de marcação">
            </div>
          </div> 
          <div class="col-6"> 
            <div class="form-group">
                <input type="datetime-local"  name="end" id="end" class="form-control date-time" placeholder="Data/Hora Final de marcação">
            </div>
          </div>  
          
      </div>

      <div class="row col-8 mx-auto">
        <div class="col-12"> 
          <div class="form-group">
              <input type="color"  name="color" id="color" class="form-control" placeholder="Data Final de marcação">
          </div>
        </div>
      </div>  

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

