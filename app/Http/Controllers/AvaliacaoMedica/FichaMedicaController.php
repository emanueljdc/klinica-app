<?php

namespace App\Http\Controllers\AvaliacaoMedica;

use App\Http\Controllers\Controller;
use App\Models\Admin\Paciente;
use App\Models\AvaliacaoMedica\FichaMedica;
use Illuminate\Http\Request;

class FichaMedicaController extends Controller
{
    protected $paciente;
    protected $fichaMedica;

    public function __construct(Paciente $paciente, FichaMedica $fichaMedica)
    {
        //para proteger a pagina - impede a abertura atraves da colocação do endereço da pagina
        $this->middleware('auth');

        $this->paciente = $paciente;
        $this->fichaMedica = $fichaMedica;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //ir buscar so os dados necessários do paciente para preencher a tabela
        $pacientes = $this->paciente::all();
        return view('avaliacaomedica.listapaciente', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //echo "estou em edit $id";
        $paciente = $this->paciente::find($id);
        
        if(!$paciente)
            return redirect()->back();

        return view('avaliacaomedica.fichamedica', compact('paciente'));    
       
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
