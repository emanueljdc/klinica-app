<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\Medico;
use Livewire\Component;
use Livewire\WithPagination;

class MedicoComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nomeM;

    public function render()
    {
        //$medicos = Medico::get();

        //$medicos = Medico::paginate(10);
        $medicos = Medico::OrderBy('id', 'DESC')->get();
        return view('livewire.admin.medico-component', compact('medicos'));
        
    }

    public function store(){
        Medico::create([
            'nomeMedico' => $this->nomeM,
        ]);
    }

}
