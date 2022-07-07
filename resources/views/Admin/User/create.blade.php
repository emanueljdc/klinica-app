@extends('adminlte::page')

@section('title', 'Inserir Novo Utilizador')

@section('content_header')
    <div>
        <h1 class="m-0 text-dark">
            Inserir Novo Paciente
        </h1>

        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('user.index') }}" >
                Utilizadores</a>
            </li>
            
            <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('user.create') }}" >
                Inserir </a>
            </li>
        </ol>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light"></div> 
                <div class="card-body ">
                        
                    @include('admin.includes.alert')

                    <form action="{{ route('user.store') }}" class="form" method="POST">
                        {{-- @include('admin.user._partials.form') --}}

                        @csrf
                        <!-- <input type="hidden" value="{{ Auth::user()->id ?? old('user_id') }}" name="user_id" class="form-control" placeholder="ID do User"> -->

                        <div class="form-group">
                            <input type="text" value="{{ $user->name ?? old('name') }}" name="name" class="form-control" placeholder="Nome do utilizador">
                            <!-- <input type="text" value="{{-- $paciente->id ?? old('id') --}}" name="id" class="form-control"> -->
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $user->email ?? old('email') }}" name="email" class="form-control" placeholder="Email do utilizador">
                            <!-- <input type="text" value="{{-- $paciente->id ?? old('id') --}}" name="id" class="form-control"> -->
                        </div>

                        <div class="form-group">
                            <input type="password" value="{{ $user->password ?? old('password') }}" name="password" class="form-control" placeholder="Senha do utilizador">
                            <!-- <input type="text" value="{{-- $paciente->id ?? old('id') --}}" name="id" class="form-control"> -->
                        </div>

                        
                        <div class="form-group">
                            <select name="funcao_id" class="form-control">
                            <option value=""> Selecione perfil... </option>
                                @foreach($tipoUsers as $tipoUser)
                                    <option value="{{ $tipoUser->id}}"
                                        @if(isset($user->funcao_id) && $tipoUser->id == $user->funcao_id)
                                            selected
                                        @endif
                                        >  
                                            {{ $tipoUser->funcao }} 
                                    </option>
                                @endforeach
                            </select>
                        </div> 
                        

                        <div class="form-group">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-window-close"></i> Cancelar  </a>
                            <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Gravar </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>  


@stop

@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

