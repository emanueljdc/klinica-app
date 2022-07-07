@extends('adminlte::page')

@section('title', 'Detalhes do Paciente')

@section('content_header')
    <h1 class="m-0 text-dark">
        <p>Deseja excluir paciente: <strong><em> {{ $paciente->nome}}</em> </strong></p>
    </h1>
    {{-- 
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('paciente.index') }}" >
            Pacientes</a>
        </li>
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('paciente.show', $paciente->id) }}" >
            Visualizar</a>
        </li>
    </ol> --}}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light"></div> 
                <div class="card-body ">

                    <p><strong>ID: </strong> {{ $paciente->id }} </p>
                    <p><strong>Nome: </strong> {{ $paciente->nome }} </p>
                    {{-- <p><strong>NIF: </strong> {{ $paciente->nif }} </p>
                    <p><strong>Endereço: </strong> {{ $paciente->endereco }} </p>
                    <p><strong>Bairro: </strong> {{ $paciente->bairro }} </p>
                    <p><strong>Ilha: </strong> {{ $paciente->ilha->nome }} </p>
                    <p><strong>Telemóvel: </strong> {{ $paciente->telemovel }} </p>
                    <p><strong>Email: </strong> {{ $paciente->email }} </p> --}}
                    <hr>
                    <form action="{{ route('paciente.destroy', $paciente->id) }}" class="form" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <a href="{{ route('paciente.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-window-close"></i>
                        Cancelar  </a>


                        <button type="submit" class="btn btn-danger btn-sm mx-4"> 
                            <i class="fa fa-trash"></i>
                        Confirmar Exclusão </button>

                    </form>
                </div>
            </div>
        </div>
    </div>  
@stop


@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

