@extends('adminlte::page')

@section('title', 'Inserir Novo Paciente')

@section('content_header')
    <h1 class="m-0 text-dark">
        Inserir Evento
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light"></div> 
                <div class="card-body ">
                    <form action="{{ route('agenda.store') }}" class="form" method="POST">
                        @include('agenda._partials.form')
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