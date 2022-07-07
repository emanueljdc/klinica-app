<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'nacionalidades';

    protected $fillable = [
        'pais', 
    ];
}
