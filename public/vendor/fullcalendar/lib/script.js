
$(function(){

    //cria mascara para introdução de data e hora no campos texto. usa a biblioteca moment
    $('.date-time').mask('00/00/0000 00:00:00');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//cria o evento clique no botão de salvar
/*
    $(function () {
        $("#deleteEvent").click(function(e) {
            e.preventDefault();
            let id = $("#modalCalendar input[name='id']").val();

            let Event = {
                id: id,
                _method: 'DELETE',
            };

            route = routeEvents('routeEventDelete');
            sendEvent(route, Event);
        });
    });
*/


});

/*
$(function () {
    $("#saveEvent").click(function(e) {
            e.preventDefault();
            //passa os valores nos campos no formulario e coloca em variaveis
            let id = $("#modalCalendar input[name='id']").val();
            let title = $("#modalCalendar input[name='title']").val();
            let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
            let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
            let color = $("#modalCalendar input[name='color']").val();
            let descricao = $("#modalCalendar textarea[name='descricao']").val();

            let Event = {
                title: title,
                start: start,
                end: end,
                color: color,
                descricao: descricao,
            };

            let route;

            if(id == ''){
                route = routeEvents('routeEventStore');
            }else{
                route = routeEvents('routeEventUpdate');
                Event.id = id;
                Event._method = 'PUT';
            }


            sendEvent(route, Event);
            
        });
});*/

function gravarEvento() {
            //passa os valores nos campos no formulario e coloca em variaveis
            let id = $("#modalCalendar input[name='id']").val();
            let title = $("#modalCalendar input[name='title']").val();
            let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
            let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
            let color = $("#modalCalendar input[name='color']").val();
            let descricao = $("#modalCalendar textarea[name='descricao']").val();

            let Event = {
                title: title,
                start: start,
                end: end,
                color: color,
                descricao: descricao,
            };

            let route;

            if(id == ''){
                route = routeEvents('routeEventStore');
            }else{
                route = routeEvents('routeEventUpdate');
                Event.id = id;
                Event._method = 'PUT';
            }

           sendEvent(route, Event);
}

function excluirEvento() {

    let id = $("#modalCalendar input[name='id']").val();

    let Event = {
        id: id,
        _method: 'DELETE',
    };

    route = routeEvents('routeEventDelete');
    sendEvent(route, Event);
}



function sendEvent(route, data_){
    $.ajax({
        url: route,
        method:'POST',
        data: data_,
        dataType: 'json',
        success: function(json){
            if(json){
                location.reload();
            }
        }

    });
}

function routeEvents(route){
    return document.getElementById('calendar').dataset[route];
}

function resetForm(form){
    $(form)[0].reset();
}
