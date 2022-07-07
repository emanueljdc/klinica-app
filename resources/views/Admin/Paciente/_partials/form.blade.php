@csrf
<input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" class="form-control" placeholder="ID do User">

<div class="form-group">
    <input type="text" value="{{ $paciente->nome ?? old('nome') }}" name="nome" class="form-control" placeholder="Nome do paciente">
    <!-- <input type="text" value="{{-- $paciente->id ?? old('id') --}}" name="id" class="form-control"> -->
</div>
<!--
<div class="form-group">
    <input type="text" value="{{-- $paciente->nif ?? old('nif') --}}" name="nif" class="form-control" placeholder="NIF do paciente">
</div>
<div class="form-group">
    <input type="text" value="{{-- $paciente->endereco ?? old('endereco') --}}" name="endereco" class="form-control" placeholder="Endereço do paciente">
</div>
<div class="form-group">
    <input type="text" value="{{-- $paciente->bairro ?? old('bairro') --}}" name="bairro" class="form-control" placeholder="Bairro do paciente">
</div> -->

<!--
<div class="form-group">
    <select name="ilha_id" class="form-control">
    <option value=""> Selecione ilha... </option>
        {{-- @foreach($ilhas as $ilha) --}}
            <option value="{{-- $ilha->id_ilha --}}"
                {{-- @if(isset($paciente->ilha_id) && $ilha->id_ilha == $paciente->ilha_id)
                    selected
                @endif --}}
                >  
                    {{-- $ilha->nome --}} 
            </option>
        {{-- @endforeach --}}
    </select>
</div> 
-->

<!-- 
<div class="form-group">
    <input type="text" value="{{-- $paciente->telemovel ?? old('telemovel') --}}" name="telemovel" class="form-control" placeholder="Nº de Telemóvel">
</div>
<div class="form-group">
    <input type="email" value="{{-- $paciente->email ?? old('email') --}}" name="email" class="form-control" placeholder="Emaildo paciente">
</div> -->


<div class="form-group">
    <a href="{{ route('paciente.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-window-close"></i> Cancelar  </a>
    <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Gravar </button>
</div>