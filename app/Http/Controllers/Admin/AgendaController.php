<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    protected $agenda;

    public function __construct(Agenda $agenda)
    {
        //para proteger a pagina - impede a abertura atraves da colocação do endereço da pagina
        $this->middleware('auth');

        $this->agenda = $agenda;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$eventos = $this->agenda::all();

        //return response()->json($eventos);
        //return view('agenda.index', compact('eventos'));
/*
        $event=[];

        foreach($eventos as $row){
            $dataEvento = $row->dataEvento;
            $event[] = $this->agenda::event(
                $row->evento,
                true,
                new \DateTime($row->dataEvento),
                new \DateTime($row->horaEvento),
                $row->id,
                [
                    'color' => $row->cor,
                ]
            );

        }

        $calendar = $this->agenda::addEvents($event);
        return view('agenda.index', compact('eventos', 'calendar')); */

        return view('agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = $this->agenda::create($request->all());

        //pode ser feito tambem desta forma
        /*$agenda = new agenda();
        $agenda->nome  = $request->get('nome');
        $agenda->save();*/


        return redirect()
                ->route('agenda.index')
                ->with('success', 'Registo inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo '//abre o calendario - edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
