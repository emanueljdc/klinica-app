<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $site;

    public function __construct(Site $site)
    {
        //para proteger a pagina - impede a abertura atraves da colocação do endereço da pagina
        //$this->middleware('auth');

        $this->site = $site;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'site';
        //$medicos = $this->medico->with(['especialidade', 'nacionalidade'])->get();
        return view('site.home');
    }
    public function contacto()
    {
        //return 'site';
        //$medicos = $this->medico->with(['especialidade', 'nacionalidade'])->get();
        return view('site.contacto');
    }
}
