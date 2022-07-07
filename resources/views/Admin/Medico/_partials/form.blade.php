@csrf
<input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" class="form-control" placeholder="ID do User">

<div class="form-group">
    <input type="text" value="{{ $medico->nome ?? old('nome') }}" name="nome" class="form-control" placeholder="Nome do medico">
    <!-- <input type="text" value="{{-- $medico->id ?? old('id') --}}" name="id" class="form-control"> -->
</div>
<!--
<div class="form-group">
    <input type="text" value="{{-- $medico->nif ?? old('nif') --}}" name="nif" class="form-control" placeholder="NIF do medico">
</div>
<div class="form-group">
    <input type="text" value="{{-- $medico->endereco ?? old('endereco') --}}" name="endereco" class="form-control" placeholder="Endereço do medico">
</div>
<div class="form-group">
    <input type="text" value="{{-- $medico->bairro ?? old('bairro') --}}" name="bairro" class="form-control" placeholder="Bairro do medico">
</div> -->
<div class="row">
    <div class="form-group col-6">
        <select name="especialidade_id" class="form-control">
        <option value=""> Selecione especialidade... </option>
            @foreach($especialidades as $especialidade)
                <option value="{{ $especialidade->id }}"
                    @if(isset($medico->especialidade_id) && $especialidade->id == $medico->especialidade_id)
                        selected
                    @endif 
                    >  
                        {{ $especialidade->especialidade }} 
                </option>
            @endforeach 
        </select>
    </div> 
    <div class="form-group col-6">
        <select name="nacionalidade_id" class="form-control">
        <option value=""> Selecione nacionalidade... </option>
            @foreach($nacionalidades as $nacionalidade)
                <option value="{{ $nacionalidade->id }}"
                    @if(isset($medico->nacionalidade_id) && $nacionalidade->id == $medico->nacionalidade_id)
                        selected
                    @endif 
                    >  
                        {{ $nacionalidade->pais }} 
                </option>
            @endforeach 
        </select>
    </div> 
</div>




<!--
<div class="form-group">
    <select name="ilha_id" class="form-control">
    <option value=""> Selecione ilha... </option>
        {{-- @foreach($ilhas as $ilha) --}}
            <option value="{{-- $ilha->id_ilha --}}"
                {{-- @if(isset($medico->ilha_id) && $ilha->id_ilha == $medico->ilha_id)
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
    <input type="text" value="{{-- $medico->telemovel ?? old('telemovel') --}}" name="telemovel" class="form-control" placeholder="Nº de Telemóvel">
</div>
<div class="form-group">
    <input type="email" value="{{-- $medico->email ?? old('email') --}}" name="email" class="form-control" placeholder="Emaildo medico">
</div> -->


<div class="form-group">
    <a href="{{ route('medico.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-window-close"></i> Cancelar  </a>
    <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Gravar </button>
</div>