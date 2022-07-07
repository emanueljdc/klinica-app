<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'medicos';

    /*protected $fillable = [
        'nome', 'nacionalidade_id', 'especialidade_id',
    ];*/

    //OU

    protected $guarded = [];


    public function especialidade()
    {
        return $this->hasOne(Especialidade::class, 'id', 'especialidade_id' );
    }


    public function nacionalidade()
    {
        return $this->hasOne(Nacionalidade::class, 'id', 'nacionalidade_id' );
    }

}
