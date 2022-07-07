<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Acrescentado para usar Datatables  -->
    @yield('css') 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
    {{--  @livewireStyles --}}

</head>
<body>
    {{ $slot }}

    {{-- @yield('content') 


    @livewireScripts --}}

    <script>
        //script para excluir paciente
        //nao funciona
        /*$('#excluirModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);

            var id_paciente = button.data('idPaciente');
            var modal = $(this);

            modal.find('.modal-body #idPaciente').val(id_paciente);
        })*/

        /*
        $(document).ready(function(){
            $('#btnexcluirModal').('click', function({
                $('#excluirModal').modal('show');

                /*$tr = $(this).closes('tr');

                var data = $tr.chidren("td").map(function(){
                    return $(this).text();
                }).get();

                $('idPaciente').val(data[0]);

            }));

        });

        */
    </script>


     @yield('js') 
</body>
</html>
