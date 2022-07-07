@extends('adminlte::page') 

@section('title', 'Medico')

@section('css')
    {{-- esta secção é para caregar css para Datatables e para Modal  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
--}}
    
{{-- para tornar o datatabel responsivo - nao funciona 
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css"> 
    --}}

    {{-- para utilizar botoes no datatable 
    <link href="{{ asset('/DataTables/datatables.min.css') }}" rel="stylesheet"> 
    
    <link href="{{ asset('/DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> 
--}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css"/>

        <style>
            table th{
                background-color: #22a593 !important;
                color: blanchedalmond;
            } 
   
        </style>

@endsection

@section('content_header')

    @include('admin.medico._partials.form_modal')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 text-gray"><i class="fas fa-user-friends mx-2"></i>Médicos </h4>
                    
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" >Dashboard</a></li>
                        <li class="breadcrumb-item"aria-current="page" ><a class="active" href="{{ route('medico.index') }}" >Medicos</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    {{-- <style>
        nav svg {
            max-height: 20px;
        }
    </style> --}} 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.includes.alert')
                    
                    <a href="{{ route('medico.create') }}" class="btn btn-success btn-sm mb-4">
                        <i class="fas fa-plus-square"></i> Adicionar  </a>
                    <!-- Normal(sem data table) <table  class="table table-striped table-sm table-bordered"> 
                        <table id="dataTablemedico" class="display responsive nowrap table-sm  shadow-lg" style="width:100%">-->
                        
                    <table id="dataTablemedico" class="table table-striped table-bordered dt-responsive nowrap table-sm  shadow-lg"  style="width:100%">
                        <!-- <thead class="thead-dark"> -->
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Medico</th>
                                <th scope="col">Especialidade</th>
                                <th scope="col">Nacionalidade</th>
                                <!-- <th scope="col">Inserido</th> -->
                                <th scope="col" width="28%"> Ação<!-- <a href="{{ route('medico.create') }}" class="btn btn-success btn-sm mb-4">
                                    <i class="fas fa-plus-square"></i> Adicionar  </a> --> </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($medicos as $medico)
                                <tr>
                                    <td scope="row">{{ $medico->id }}</td>
                                     <td><a href="{{ route('medico.show', $medico->id) }}"> {{ $medico->nome }} </a>  </td> 
                                    <!--<td> {{ $medico->nome }} </td>-->
                                    <td> {{ $medico->especialidade->especialidade }} </td>
                                    <td> {{ $medico->nacionalidade->pais }} </td>
                                    <!-- <td> {{-- $medico->created_at->diffForHumans() --}} </td> -->
                                   
                                    <td> 
                                        <a href="{{ route('medico.edit', $medico->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        Editar </a>

                                        <a href="{{ route('medico.show', $medico->id) }}" class="btn btn-info btn-sm">
                                            <i class="far fa-eye"></i>
                                        Visualizar </a>

                                        <a href="{{ route('medico.delete', $medico->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        Excluir </a>
                                        
                                        <!--    
                                        <button type="button" class="btn btn-danger btn-sm" data-idmedico= {{ $medico->id }} data-toggle="modal" data-target="#excluirModal">
                                            <i class="fa fa-trash"></i>
                                            Excluir
                                        </button>  
                                           
                                        <form action="{{-- route('medico.destroy', $medico->id) --}}" class="form" method="POST">
                                            {{-- @csrf --}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"> 
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            Excluir </button>
                                        </form>   
                                    
                                        -->

                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                        
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Médico</th>
                                <th scope="col">Especialidade</th>
                                <th scope="col">Nacionalidade</th>
                                <th scope="col" width="28%">Ação</th>
                            </tr>
                        </tfoot>

                    </table>

                    @section('js')
                        {{-- esta secção é para carregar java script para Datatables e para Modal --}}
                         <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
                       {{--
                        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> 
                        --}}

                        {{-- para tornar o datatabel responsivo  nao funciona 
                        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script> 
                        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
                        --}}
                   
                        {{--
                        <script src="{{ asset('/DataTables/datatables.min.js') }}" defer></script>  
                        <link href="{{ asset('/DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js') }}" rel="stylesheet"> 
                        
                         para utilização de botoes no datatables 
                        <script src="{{ asset('/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js') }}" defer></script>  
                        <script src="{{ asset('/DataTables/JSZip-2.5.0/jszip.min.js') }}" defer></script> 
                        <script src="{{ asset('/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}" defer></script>  
                        <script src="{{ asset('/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}" defer></script>  
                        <script src="{{ asset('/DataTables/Buttons-1.7.0/js/buttons.html5.min.js') }}" defer></script>   
                        --}}

                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
                        



                        {{-- script para inicializar o data table --}}
                        <script>
                            //$(document).ready(function() {
                                $('#dataTablemedico').DataTable({

                                    /*responsive: 
                                        details: false
                                    }*/
                                    
                                    /*responsive: true,
                                    autoWidth: true,*/
                                    /*utoFill:true,
                                    autoFill: {
                                        alwaysAsk: true
                                    },*/

                                    //scrollY: 200,

                                    
                                    "responsive": true,
                                    //"searching": true,
                                    //"ordering": true,
                                    //"processing": true,
                                    //"lengthChange": true,
                                    //cria os botoes para exportar para pdf, excel e imprimir
                                    "dom": 'lfrBtip',
                                    //"dom": '<"top"lfB>t<"bottom"ip><"clear">',
                                    "buttons": [
                                        {
                                            extend: 'excelHtml5',
                                            text: '<i class="fas fa-file-excel"></i>',
                                            titleAttr: 'Exportar para Excel',
                                            className: 'btn btn-success'
                                        },
                                        {
                                            extend: 'pdfHtml5',
                                            text: '<i class="fas fa-file-pdf"></i>',
                                            titleAttr: 'Exportar para PDF',
                                            className: 'btn btn-danger'
                                        },  
                                        {
                                            extend: 'print',
                                            text: '<i class="fa fa-print"></i>',
                                            titleAttr: 'Imprimir',
                                            className: 'btn btn-info'
                                        },
                                    ],

                                        
                                    //cria uma paginação difrente do standard
                                    "lengthMenu":[[5, 10, 50, -1], [5, 10, 50, "Todos"]],
                                    
                                    //tipo de paginação
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

                            //});


                        </script> 

                    @endsection

                </div>
                {{-- $medicos->links() --}}
            </div>
        </div>
    </div>
    <!-- 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- $medicos->links() --}}
                </div>
            </div>
        </div>
    </div>
    -->
@stop

@section('footer')
    <p class="mb-0">Copyright © 2021 Emanuel Correia.</p>
@stop

