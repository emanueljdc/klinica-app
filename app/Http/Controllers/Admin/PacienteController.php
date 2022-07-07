<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PacienteFormRequest;
use App\Models\Admin\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacienteMail;

class PacienteController extends Controller
{
    //protected $paginationTheme = 'bootstrap';

    protected $paciente;
    //protected $num_pagina;

    public function __construct(Paciente $paciente)
    {
        //para proteger a pagina - impede a abertura atraves da colocação do endereço da pagina
        $this->middleware('auth');

        $this->paciente = $paciente;
        //$this->num_pagina = 2;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pacientes = Paciente::all();
        //$pacientes = Paciente::orderBy('id','DESC')->paginate(2);
        //$pacientes = $this->paciente::orderBy('id','DESC')->paginate($this->num_pagina);
        $pacientes = $this->paciente::orderBy('id','desc')->get();
        return view('admin.paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteFormRequest $request)
    {
        //echo ('estou em store');
       
        $paciente = $this->paciente::create($request->all());

        //pode ser feito tambem desta forma
        /*$paciente = new Paciente();
        $paciente->nome  = $request->get('nome');
        $paciente->save();*/


        return redirect()
                ->route('paciente.index')
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
        
        $paciente = $this->paciente::where('id',$id)->first();

        if(!$paciente)
            return redirect()->back();

        return view('admin.paciente.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //$ilhas = Ilha::all();
        //$paciente = $this->paciente::where('id',$id)->first();
        $paciente = $this->paciente::find($id);
        
        if(!$paciente)
            return redirect()->back();

        return view('admin.paciente.edit', compact('paciente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteFormRequest $request, $id)
    {
       // echo " paciente {$id}";
       //$paciente = new Paciente();
       $paciente = $this->paciente::find($id);
       $paciente->nome  = $request->get('nome');

       $paciente->save();

        //pode ser feito tb desta forma, usando DB
       /*$paciente = DB::table('pacientes')->where('id', $id)
       ->update([
           'nome'          => $request->nome,
           'nif'           => $request->nif,
           'endereco'      => $request->endereco,
           'bairro'        => $request->bairro,
           'ilha_id'       => $request->ilha_id,
           'telemovel'     => $request->telemovel,
           'email'         => $request->email,
           'user_id'       => $request->user_id,
        ]);*/

        if (!$paciente)
            return redirect()->back()
                ->with('warning', 'Erro - Registo não editado!');
        else
            return redirect()
                    ->route('paciente.index')
                    ->with('success', 'Registo editado com sucesso!');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $paciente = $this->paciente::find($id);
        $paciente->delete();
        
        //Pode ser feito tambem desta forma";
        /*DB::table('pacientes')
                ->where('id', $id)
                ->delete();
        */
        return redirect()
                ->route('paciente.index')
                ->withSuccess('Registo excluido com sucesso!');
    }

    public function enviarEmail($id)
    {
        
        $paciente = $this->paciente::find($id);
        return view('admin.paciente.enviaremail', compact('paciente'));
    }

    public function StoreEnviarEmail(Request $request)
    {
        //verificar porque não está a funcionar
        $detalhes=[
            'nome'      => $request->nome,
            'email'     => $request->email,
            'telemovel' => $request->telemovel,
            'mensagem'  => $request->mensagem,
        ];
        
        Mail::to('emanueljdc@gmail.com')->send(new PacienteMail($detalhes));
        return redirect()->back()
                ->with('success', 'Mensagem enviada com sucesso!');
    }

    public function excluir($id)
    {
        
        $paciente = $this->paciente::find($id);
        return view('admin.paciente.delete', compact('paciente'));
    }




}
