@extends('adminlte::page')

@section('title', 'Detalhes do Médico')

@section('content_header')
    <h1 class="m-0 text-dark">
        Detalhes do medico: <strong><em> {{ $medico->nome}}</em> </strong>
    </h1>
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('medico.index') }}" >
            Médicos</a>
        </li>
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('medico.show', $medico->id) }}" >
            Visualizar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light"></div> 
                <div class="card-body ">

                    <p><strong>ID: </strong> {{ $medico->id }} </p>
                    <p><strong>Nome: </strong> {{ $medico->nome }} </p>
                    <p><strong>Especialidade: </strong> {{ $medico->especialidade->especialidade }} </p>
                    <p><strong>Nacionalidade: </strong> {{ $medico->nacionalidade->pais }} </p>
                    {{-- <p><strong>NIF: </strong> {{ $medico->nif }} </p>
                    <p><strong>Endereço: </strong> {{ $medico->endereco }} </p>
                    <p><strong>Bairro: </strong> {{ $medico->bairro }} </p>
                    <p><strong>Ilha: </strong> {{ $medico->ilha->nome }} </p>
                    <p><strong>Telemóvel: </strong> {{ $medico->telemovel }} </p>
                    <p><strong>Email: </strong> {{ $medico->email }} </p> --}}
                    <hr>
                    <form action="{{ route('medico.destroy', $medico->id) }}" class="form" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <a href="{{ route('medico.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-window-close"></i>
                        Cancelar  </a>

                        <a href="{{ route('medico.edit', $medico->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        Editar </a>

                        <button type="submit" class="btn btn-danger btn-sm"> 
                            <i class="fa fa-trash"></i>
                        Excluir </button>

                        <a href="#" class="btn btn-success btn-sm mx-4">
                            <i class="fas fa-envelope-square"></i>
                        Enviar Mensagem  </a>
  
                    </form>
                </div>
            </div>
        </div>
    </div>  
@stop


@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

