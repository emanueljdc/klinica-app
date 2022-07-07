<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilha extends Model
{
    use HasFactory;

    protected $table = 'ilhas';

    protected $fillable = [
        'nome', 
    ];
}
