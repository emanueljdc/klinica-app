<?php

use App\Http\Controllers\Admin\{
    MedicoController,
    PacienteController,
    AgendaController,
    EventController,
    UserController,
};
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvaliacaoMedica\FichaMedicaController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\{
    MedicoComponent,
};


//rotas de ficha de avaliacao medica

Route::get('FichaMedica/{id}', [FichaMedicaController::class, 'edit'])->name('avaliacaomedica.FichaMedica');
Route::get('ListaPaciente', [FichaMedicaController::class, 'index'])->name('avaliacaomedica.ListaPaciente');


//-----------------------------------------------------------------------------------------------------
//rotas de site
Route::get('contacto', [SiteController::class, 'contacto'])->name('site.contacto');
Route::get('homepage', [SiteController::class, 'index'])->name('site.homepage');


//-----------------------------------------------------------------------------------------------------
//rotas de administração
Route::delete('event-destroy', [EventController::class, 'destroy'])->name('routeEventDelete');
Route::post('event-store', [EventController::class, 'store'])->name('routeEventStore');
Route::put('event-update', [EventController::class, 'update'])->name('routeEventUpdate');
Route::get('load-events', [EventController::class, 'loadEvents'])->name('routeLoadEvents');
Route::resource('agenda', AgendaController::class);

//Route::post('agenda/guardar', [AgendaController::class, 'guardar'])->name('agenda.guardar');
//rota para criar calendario
//Route::get('agenda/consulta', [AgendaController::class, 'index'])->name('agenda.consulta');
//Route::post('fullcalenderAjax', [CalendarioController::class, 'ajax']);
//Route::get('admin/calendario/consulta', [CalendarioController::class, 'index'])->name('calendario.consulta');

Route::post('admin/paciente/StoreEnviarEmail', [PacienteController::class, 'StoreEnviarEmail'])->name('paciente.storenviaremail');
Route::get('admin/paciente/enviaremail/{id}', [PacienteController::class, 'enviarEmail'])->name('paciente.enviaremail');
Route::get('/admin/paciente/excluir/{id}', [PacienteController::class, 'excluir'])->name('paciente.delete');
Route::resource('/admin/paciente', PacienteController::class);

//Route::any('medico',MedicoComponent::class)->name('medico');
Route::get('/admin/medico/excluir/{id}', [MedicoController::class, 'excluir'])->name('medico.delete');
Route::resource('/admin/medico', MedicoController::class);

Route::post('/user.store', [UserController::class, 'store'])->name('user.store');
Route::get('/user.create', [UserController::class, 'create'])->name('user.create');
Route::get('/user.index', [UserController::class, 'index'])->name('user.index');


/*------------------------------------------------------------------------------------------*/
Route::get('/', function () {
    //return view('welcome'); //direciona para a tela de entrada do laravel
    return view('auth.login');  //direciona para a tela de login
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
