@extends('avaliacaomedica.master.layout')


@section('css')
    {{-- esta secção é para caregar css para Datatables e para Modal  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

    <style>
      table th{
          background-color: #22a593 !important;
          color: blanchedalmond;
      } 

  </style>

@endsection


@section('content')
    
  <div class="container py-5">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- @include('admin.includes.alert') --}}
                    
                    <table id="dataTablePaciente" class="table table-striped table-sm  shadow-lg" style="width:100%">
                        <!-- <thead class="thead-dark"> -->
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Paciente</th>
                                
                                <th scope="col" width="13%">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($pacientes as $paciente)
                                <tr>
                                    <td scope="row">{{ $paciente->id }}</td>
                                    <td>{{ $paciente->nome }}</td>
                                    
                                    <td> 
                                        <a href="{{ route('avaliacaomedica.FichaMedica', $paciente->id) }}" class="btn btn-warning btn-sm">
                                          <i class="fas fa-edit"></i>
                                        Avaliação Médica </a>
                                    </td>
                                </tr>
                          @endforeach
                        </tbody>
                        
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Paciente</th>
                                <th scope="col" width="13%">Ação</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div> 
@endsection

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
                "lengthMenu":[[10, 50, 100, -1], [10, 50, 100, "Todos"]],

                "pagingType": "first_last_numbers",

                language: {
                                       
                    "emptyTable": "Não foi encontrado nenhum registo",
                    "lengthMenu": "Mostrar _MENU_ registos",
                    "zeroRecords": "Não foram encontrados resultados",
                    "search": "Procurar:",
                        "paginate": {
                        "first": "Primeiro",
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "last": "Último"
                    },
                    "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
                } 
            });
        });
    </script> 

@endsection
