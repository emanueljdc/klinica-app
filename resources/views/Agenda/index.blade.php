@extends('adminlte::page')

@section('title', 'Marcação Consulta')

@section('content_header')
    @include('agenda._partials.modal-calendar')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 text-dark">Marcação de Consulta </h4>
                    <a href="{{route('agenda.create') }}" class="btn btn-success btn-sm mt-4">
                      <i class="fas fa-plus-square"></i>
                        Adicionar Evento  
                      </a>
                      <!-- 
                    <a href="{{-- route('routeEventUpdate') --}}" class="btn btn-warning btn-sm mt-4">
                      <i class="fas fa-edit"></i> 
                      Editar Evento  
                    </a>    
                    <a href="{{-- route('paciente.create') --}}" class="btn btn-danger btn-sm mt-4">
                      <i class="fa fa-trash"></i>
                    Excluir Evento  
                  </a>   
                -->
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    <link href='{{ asset("vendor/fullcalendar/lib/main.css") }}' rel='stylesheet' /> 
    
    {{-- para modal --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 

    {{-- para fulcallendar --}}
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
   <div class="row">
    <div class="col-12">
        <div class="card">
          @include('admin.includes.alert')
            <div class="card-body">
                <div id = 'calendar'                   
                    data-route-load-events = "{{ route('routeLoadEvents') }}"
                    data-route-event-update = "{{ route('routeEventUpdate') }}"  
                    data-route-event-store = "{{ route('routeEventStore') }}" 
                    data-route-event-delete = "{{ route('routeEventDelete') }}" >
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
          margin: 40px 10px;
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }
      
        #calendar {
          max-width: 1100px;
          margin: 0 auto;
        }
    </style>
</div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    {{-- para formatação de data e hora --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    
    {{-- para fullcalendar --}}
    <script src='{{ asset("vendor/fullcalendar/lib/main.js") }}'>       </script>
    <script src='{{ asset("vendor/fullcalendar/lib/locales/pt.js") }}'> </script>
    <script src='{{ asset("vendor/fullcalendar/lib/script.js") }}'>     </script>

    <script> 
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
              locale: 'pt',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            //initialDate: '2021-03-08',
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true,
            dayMaxEvents: true, // allow "more" link when too many events
            selectable: true,
            selectMirror: true,
            editable: true,
            
            eventDrop: function(element){
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                  _method: 'PUT',
                  id: element.event.id,
                  start: start,
                  end: end,
                };

                sendEvent(routeEvents('routeEventUpdate'), newEvent);
            },

            eventResize: function(element){
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                  _method: 'PUT',
                  id: element.event.id,
                  start: start,
                  end: end,
                };

                sendEvent(routeEvents('routeEventUpdate'), newEvent);
            },

             
            select: function(element){
              resetForm("#frmEventCalendar"); //chama função para limpar formulario

              var myModal = new bootstrap.Modal(document.getElementById('modalCalendar')).show();
              $("#modalCalendar #titleModal").text('Inserir Evento');
              $("#modalCalendar button.deleteEvent").css("display", "none");
              

              let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
              let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
              
              $("#modalCalendar input[name='start']").val(start);
              $("#modalCalendar input[name='end']").val(end);
              $("#modalCalendar input[name='color']").val('#3788D8');

              calendar.unselect();
             
            },

            eventClick: function(element){
                resetForm("#frmEventCalendar"); //chama função para limpar formulario
                
                var myModal = new bootstrap.Modal(document.getElementById('modalCalendar')).show();

                $("#modalCalendar #titleModal").text('Editar Evento');
                $("#modalCalendar button.deleteEvent").css("display", "flex");

                //pega os valores da celula selecionada
                let id = element.event.id;
                let title = element.event.title;
                let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
                let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
                let color = element.event.backgroundColor;
                let descricao = element.event.extendedProps.descricao;

                //passa o valor das variaveis para os campos no formulario
                $("#modalCalendar input[name='id']").val(id);
                $("#modalCalendar input[name='title']").val(title);
                $("#modalCalendar input[name='start']").val(start);
                $("#modalCalendar input[name='end']").val(end);
                $("#modalCalendar input[name='color']").val(color);
                $("#modalCalendar textarea[name='descricao']").val(descricao);
            },

            events: routeEvents('routeLoadEvents'),
          });
      
          calendar.render();
        });
      </script>
   
@endsection