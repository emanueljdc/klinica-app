<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $table = 'exames';

    protected $fillable = [
        'exame', 
    ];
}
