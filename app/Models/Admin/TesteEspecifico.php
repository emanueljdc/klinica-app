<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesteEspecifico extends Model
{
    use HasFactory;

    protected $table = 'testes_especificos';

    protected $fillable = [
        'teste_especifico', 
    ];
}
