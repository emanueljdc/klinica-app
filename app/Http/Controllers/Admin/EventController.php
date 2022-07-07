<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormEventRequest;
use App\Models\Admin\Agenda;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function loadEvents(){
        /*verificar a consulta para nao trazer todos eventos-talves trazer apenas evntos 
        dos ultimos tres meses */

        $eventos = Agenda::all();
        /*
        $eventos = Agenda::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);*/


        return response()->json($eventos);
    }

    public function store(Request $request){

        Agenda::create($request->all());

        return response()->json(true);

        //pode ser feito tambem desta forma
        /*
        $agenda = new Agenda();
        $agenda->title  = $request->get('title');
        $agenda->start  = $request->get('start');
        $agenda->end  = $request->get('end');
        $agenda->color  = $request->get('color');
        $agenda->user_id  = $request->get('user_id');
        $agenda->descricao  = $request->get('descricao');
        $agenda->save();*/
        
    }

    public function update(Request $request){
        
        $evento = Agenda::where('id', $request->id)->first();

        $evento->fill($request->all());
        $evento->save();

        return response()->json(true);
    }

    public function destroy(Request $request){

        $evento = Agenda::where('id', $request->id)->delete();
        return response()->json(true);
    }
}

