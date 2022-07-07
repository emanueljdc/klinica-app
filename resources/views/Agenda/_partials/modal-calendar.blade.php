

<!-- Modal -->
<div class="modal fade" id="modalCalendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="" id='frmEventCalendar'>
                @csrf
                <input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" >
                <input type="text" name="id" >
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input type="text" name="title" id="title" class="form-control" placeholder="Evento - marcação de consulta">
                    </div>
                  </div>      
                </div>

                <div class="row">
                    <div class="col-6">     
                      <div class="form-group">
                          <input type="text" name="start" id="start" class="form-control" placeholder="Data/Hora Inicio de marcação"> 
                      </div>
                    </div> 
                    <div class="col-6"> 
                      <div class="form-group">
                          <input type="text" name="end" id="end" class="form-control" placeholder="Data/Hora Final de marcação">
                      </div>
                    </div>  
                </div>

                <div class="row">
                  <div class="col-12"> 
                    <div class="form-group">
                        <input type="color"  name="color" id="color" class="form-control" placeholder="Data Final de marcação">
                    </div>
                  </div>
                </div>  

                <div class="row"> 
                      <div class="col-12">     
                        <div class="form-group">
                          <textarea name="descricao" id="descricao" cols="30" rows="3" class="form-control" placeholder="Observação"></textarea>
                        </div>
                      </div> 
                </div>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="gravarEvento()" class="btn btn-success saveEvent" id="saveEvent">Gravar</button>
        <button type="button" onclick="excluirEvento()" class="btn btn-danger deleteEvent" id="deleteEvent">Excluir</button>
      </div>
    </div>
  </div>
</div>
  
  
  
  


