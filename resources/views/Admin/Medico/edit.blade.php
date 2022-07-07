@extends('adminlte::page')

@section('title', 'Editar Médico')

@section('content_header')
    <h1 class="m-0 text-dark">
        Editar medico: {{  $medico->nome }} 
    </h1>

    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('medico.index') }}" >
            medicos</a>
        </li>
        
        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('medico.show', $medico->id) }}" >
            Visualisar</a>
        </li>
        <li class="breadcrumb-item" ><a href="#" >
            Enviar Email</a>
        </li>

        <li class="breadcrumb-item" aria-current="page" ><a class="active" href="{{ route('medico.edit', $medico->id) }}" >
            Editar</a>
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

                    <form action="{{ route('medico.update', $medico->id) }}" class="form" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        @include('admin.medico._partials.form')
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