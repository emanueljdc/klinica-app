<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'especialidades';

    protected $fillable = [
        'especialidade', 
    ];
}
