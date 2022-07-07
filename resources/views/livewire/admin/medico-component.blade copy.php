@extends('adminlte::page') 


@section('content')
    <style>
                nav svg {
                    max-height: 20px;
                }
            </style>


<div class="row">
    <div class="col-12">        
        <div class="card">
            <div class="card-header bg-light"> 
                <h4>Médicos  
                    <!-- Button to Open the Modal 
                     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inserirUserModal">
                         Inserir Médico
                     </button> -->
                 </h4> 
                 <hr>

                <!-- <form method="post" wire:submit.prevent ="store"> -->
                    <div class="form-group">
                        <input type="text" name="nome" id="nome" wire:model="nomeM" class="form-control" placeholder="Nome">
                        @error('nome') <span class="error">{{ $message}}</span> @enderror
                    </div>

                    <button type="button"  class="btn btn-primary btn-sm">
                        Inserir Médico
                    </button>
                <!-- </form> --> 
            </div>





            <div class="card-body ">
                <table class="table table-striped table-sm table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" width="20%"> Ação </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicos as $medico)
                            <tr>
                                <td scope="row"> {{ $medico->id }} </td>
                                <td> {{ $medico->nomeMedico }} </td>
                            
                                <td> 
                                    <a href="#" class="badge bg-yellow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    Editar </a>

                                    <a href="#" class="badge bg-info">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-view-stacked" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z"/>
                                        </svg>
                                    Visualizar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>


    <p> {{ $medicos->links() }} </p>

@stop

<div>
    
    {{-- Because she competes with no one, no one can compete with her. --}}

    <!-- <p> TESTE LIVEWIRE </p> -->

   
       

</div>
