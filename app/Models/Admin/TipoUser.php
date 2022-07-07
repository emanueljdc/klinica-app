<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUser extends Model
{
    use HasFactory;

    protected $table = 'tipo_users';
    //protected $primarykey = 'id_funcao';

    protected $fillable = [
        'funcao', 
    ];
}
