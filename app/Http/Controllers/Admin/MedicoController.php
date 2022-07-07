<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Especialidade;
use App\Models\Admin\Medico;
use App\Models\Admin\Nacionalidade;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;

class MedicoController extends Controller
{

    //protected $paginationTheme = 'bootstrap';

    protected $medico;

    public function __construct(Medico $medico)
    {
        //para proteger a pagina - impede a abertura atraves da colocação do endereço da pagina
        $this->middleware('auth');

        $this->medico = $medico;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = $this->medico->with(['especialidade', 'nacionalidade'])->get();
        return view('admin.medico.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //busca as ilhas para preencher o select
        $especialidades = Especialidade::all();
        $nacionalidades = Nacionalidade::all();

        return view('admin.medico.create', compact(['especialidades', 'nacionalidades']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $medico = $this->medico::create($request->all());

        //pode ser feito tambem desta forma
        /*$medico = new Medico();

        $medico->nome  = $request->get('nome');
        $medico->user_id  = $request->get('user_id');
        $medico->especialidade_id  = $request->get('especialidade_id');
        $medico->nacionalidade_id  = $request->get('nacionalidade_id');
        $medico->save();*/

        return redirect()
                ->route('medico.index')
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
        $medico = $this->medico
                ->with(['especialidade', 'nacionalidade'])
                ->where('id',$id)->first();

        //$medico = $this->medico::where('id',$id)->first();

        if(!$medico)
            return redirect()->back();

        return view('admin.medico.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $especialidades = Especialidade::all();
        $nacionalidades = Nacionalidade::all();
        $medico = $this->medico::where('id',$id)->first();
       
        //$medico = $this->medico::find($id);
        /*$medico = $this->medico
                ->with(['especialidade', 'nacionalidade'])
                ->where('id',$id)->first();*/

        if(!$medico)
            return redirect()->back();

        return view('admin.medico.edit', compact(['medico','especialidades','nacionalidades']));
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
        $medico = $this->medico::find($id);

        $medico->nome  = $request->get('nome');
        $medico->especialidade_id  = $request->get('especialidade_id');
        $medico->nacionalidade_id  = $request->get('nacionalidade_id');
        $medico->save();

        $medico->save();

        if (!$medico)
            return redirect()->back()
                ->with('warning', 'Erro - Registo não editado!');
        else
            return redirect()
                    ->route('medico.index')
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
        $medico = $this->medico::find($id);
        $medico->delete();
        
        return redirect()
                ->route('medico.index')
                ->withSuccess('Registo excluido com sucesso!');
    }

    public function excluir($id)
    {
        //$medico = $this->medico::find($id);
        $medico = $this->medico
                ->with(['especialidade', 'nacionalidade'])
                ->where('id',$id)->first();

        return view('admin.medico.delete', compact('medico'));
    }


}
