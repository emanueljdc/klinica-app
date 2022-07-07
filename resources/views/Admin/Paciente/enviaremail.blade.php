@extends('adminlte::page')

@section('title', 'Enviar Email')

@section('css')
    {{-- esta secção é para caregar css para Datatables e para Modal--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">
        Enviar Email ao Paciente: <strong><em> {{  $paciente->nome }} </em></strong>
    </h1>

    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('paciente.index') }}" >
            Pacientes</a>
        </li>
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('paciente.edit', $paciente->id) }}" >
            Editar</a>
        </li>
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('paciente.show', $paciente->id) }}" >
            Visualizar</a>
        </li>
    </ol>
@stop


@section('content_header')
    <h1 class="m-0 text-dark">
        Enviar Email ao Paciente: <strong><em>{{  $paciente->nome }} </em></strong>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header bg-dark"> Contacto</div> 
                <div class="card-body ">
                        
                    @include('admin.includes.alert')

                    <form action="{{ route('paciente.storenviaremail') }}" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $paciente->id }}" name="user_id" class="form-control" placeholder="ID do User">

                        <div class="form-group">
                            <input type="text" value="{{ $paciente->nome ?? old('nome') }}" name="nome" class="form-control" placeholder="Nome do paciente">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{-- $paciente->email ?? old('email') --}}" name="email" class="form-control" placeholder="Email do paciente">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{-- $paciente->telemovel ?? old('telemovel') --}}" name="telemovel" class="form-control" placeholder="N de telemóvel">
                        </div>

                        <div class="form-group">
                            <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-control" placeholder="Mensagem" >{{-- $paciente->mensagem ?? old('mensagem') --}}</textarea>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('paciente.index') }}" class="btn btn-secondary btn-sm">
                                <i class="bi bi-x-circle"></i> Cancelar  </a>
                            <button type="submit" class="btn btn-primary btn-sm"> Enviar </button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>


        @section('js')
            {{-- esta secção é para caregar java script para Datatables e para Modal--}}
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
        @stop
    </div>  
@stop

@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- esta secção é para caregar java script para Datatables e para Modal
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    --}}
@stop