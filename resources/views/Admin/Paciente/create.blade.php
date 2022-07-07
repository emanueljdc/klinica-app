@extends('adminlte::page')

@section('title', 'Inserir Novo Paciente')

@section('content_header')
    <h1 class="m-0 text-dark">
        Inserir Novo Paciente
    </h1>

    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('paciente.index') }}" >
            Pacientes</a>
        </li>
        
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('paciente.create') }}" >
            Inserir </a>
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light"></div> 
                <div class="card-body ">
                        
                    @include('admin.includes.alert')

                    <form action="{{ route('paciente.store') }}" class="form" method="POST">
                        @include('admin.paciente._partials.form')
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