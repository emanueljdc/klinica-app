@extends('adminlte::page')

@section('title', 'Utilizador')

@section('css')
    {{-- esta secção é para caregar css para Datatables e para Modal  --}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@endsection

@section('content_header')

    {{-- @include('admin.paciente._partials.form_modal') --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 text-gray"><i class="fas fa-user-friends mx-2"></i>Utilizadores </h4>
                    
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
                        <li class="breadcrumb-item"aria-current="page" ><a class="active" href="{{ route('paciente.index') }}" >Pacientes</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.includes.alert')
                    
                    <a href="{{ route('user.create') }}" class="btn btn-success btn-sm mb-4">
                        <i class="fas fa-plus-square"></i>
                         Adicionar  </a>
                    
                    
                    <table id="dataTablePaciente" class="table table-striped table-sm  shadow-lg" style="width:100%">
                        <!-- <thead class="thead-dark"> -->
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilizador</th>
                                <th scope="col">Email</th>
                                <th scope="col" width="28%">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                   
                                    <td> 
 
                                            <a href="{{-- route('paciente.edit', $paciente->id) --}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            Editar </a>

                                            <a href="{{-- route('paciente.show', $paciente->id) --}}" class="btn btn-info btn-sm">
                                                <i class="far fa-eye"></i>
                                            Visualizar </a>

                                            <a href="{{-- route('paciente.delete', $paciente->id) --}}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            Excluir </a>
                                            <!--   
                                            <button type="button" class="btn btn-danger btn-sm" data-idPaciente= {{-- $paciente->id --}} data-toggle="modal" data-target="#excluirModal">
                                                <i class="fa fa-trash"></i>
                                                Excluir
                                            </button>  -->
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                        <!--
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Paciente</th>
                                <th scope="col" width="28%">Ação</th>
                            </tr>
                        </tfoot> -->

                    </table>

                    @section('js')
                        {{-- esta secção é para carregar java script para Datatables e para Modal --}}
                        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script> 
                        
                        {{-- script para inicializar o data table --}}
                        <script>
                            $(document).ready(function() {
                                $('#dataTablePaciente').DataTable({
                                    //cria uma paginação difrente do standard
                                    "lengthMenu":[[5, 10, 50, -1], [5, 10, 50, "Todos"]],

                                    "pagingType": "first_last_numbers",

                                    language: {
                                        //url: 'public/vendor/lang/pt-pt.txt'  
                                        
                                        "emptyTable": "Não foi encontrado nenhum registo",
                                        "loadingRecords": "A carregar...",
                                        "processing": "A processar...",
                                        "lengthMenu": "Mostrar _MENU_ registos",
                                        "zeroRecords": "Não foram encontrados resultados",
                                        "search": "Procurar:",
                                        "paginate": {
                                            "first": "Primeiro",
                                            "previous": "Anterior",
                                            "next": "Seguinte",
                                            "last": "Último"
                                        },
                                        "aria": {
                                            "sortAscending": ": Ordenar colunas de forma ascendente",
                                            "sortDescending": ": Ordenar colunas de forma descendente"
                                        },
                                        "autoFill": {
                                            "cancel": "cancelar",
                                            "fill": "preencher",
                                            "fillHorizontal": "preencher células na horizontal",
                                            "fillVertical": "preencher células na vertical",
                                            "info": "Exemplo de Auto Preenchimento"
                                        },
                                        "buttons": {
                                            "collection": "Coleção",
                                            "colvis": "Visibilidade de colunas",
                                            "colvisRestore": "Restaurar visibilidade",
                                            "copy": "Copiar",
                                            "copyKeys": "Pressiona CTRL ou u2318 + C para copiar a informação para a área de transferência. Para cancelar, clica neste mensagem ou pressiona ESC.",
                                            "copySuccess": {
                                                "1": "Uma linha copiada para a área de transferência",
                                                "_": "%ds linhas copiadas para a área de transferência"
                                            },
                                            "copyTitle": "Copiar para a área de transferência",
                                            "csv": "CSV",
                                            "excel": "Excel",
                                            "pageLength": {
                                                "-1": "Mostrar todas as linhas",
                                                "1": "Mostrar 1 linha",
                                                "_": "Mostrar %d linhas"
                                            },
                                            "pdf": "PDF",
                                            "print": "Imprimir"
                                        },
                                        "decimal": ",",
                                        "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
                                        "infoEmpty": "Mostrando 0 os registros num total de 0",
                                        "infoFiltered": "(filtrado num total de _MAX_ registos)",
                                        "infoThousands": ".",
                                        "searchBuilder": {
                                            "add": "Adicionar condição",
                                            "button": {
                                                "0": "Construtor de pesquisa",
                                                "_": "Construtor de pesquisa (%d)"
                                            },
                                            "clearAll": "Limpar tudo",
                                            "condition": "Condição",
                                            "conditions": {
                                                "date": {
                                                    "after": "Depois",
                                                    "before": "Antes",
                                                    "between": "Entre",
                                                    "empty": "Vazio",
                                                    "equals": "Igual",
                                                    "not": "Diferente",
                                                    "notBetween": "Não está entre",
                                                    "notEmpty": "Não está vazio"
                                                },
                                                "number": {
                                                    "between": "Entre",
                                                    "empty": "Vazio",
                                                    "equals": "Igual",
                                                    "gt": "Maior que",
                                                    "gte": "Maior ou igual a",
                                                    "lt": "Menor que",
                                                    "lte": "Menor ou igual a",
                                                    "not": "Diferente",
                                                    "notBetween": "Não está entre",
                                                    "notEmpty": "Não está vazio"
                                                },
                                                "string": {
                                                    "contains": "Contém",
                                                    "empty": "Vazio",
                                                    "endsWith": "Termina em",
                                                    "equals": "Igual",
                                                    "not": "Diferente",
                                                    "notEmpty": "Não está vazio",
                                                    "startsWith": "Começa em"
                                                },
                                                "array": {
                                                    "equals": "Igual",
                                                    "empty": "Vazio",
                                                    "contains": "Contém",
                                                    "not": "Diferente",
                                                    "notEmpty": "Não está vazio",
                                                    "without": "Não contém"
                                                }
                                            },
                                            "data": "Dados",
                                            "deleteTitle": "Excluir condição de filtragem",
                                            "logicAnd": "E",
                                            "logicOr": "Ou",
                                            "title": {
                                                "0": "Construtor de pesquisa",
                                                "_": "Construtor de pesquisa (%d)"
                                            },
                                            "value": "Valor"
                                        },
                                        "searchPanes": {
                                            "clearMessage": "Limpar tudo",
                                            "collapse": {
                                                "0": "Painéis de pesquisa",
                                                "_": "Painéis de pesquisa (%d)"
                                            },
                                            "count": "{total}",
                                            "countFiltered": "{shown} ({total})",
                                            "emptyPanes": "Sem painéis de pesquisa",
                                            "loadMessage": "A carregar painéis de pesquisa",
                                            "title": "Filtros ativos"
                                        },
                                        "select": {
                                            "1": "%d linha seleccionada",
                                            "_": "%d linhas seleccionadas",
                                            "cells": {
                                                "1": "1 célula seleccionada",
                                                "_": "%d células seleccionadas"
                                            },
                                            "columns": {
                                                "1": "1 coluna seleccionada",
                                                "_": "%d colunas seleccionadas"
                                            }
                                        },
                                        "thousands": "."
                                        
                                    }
                                    

                                });

                            });


                        </script> 

                    @endsection

                </div>
                {{-- $pacientes->links() --}}
            </div>
        </div>
    </div>

@stop

@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

