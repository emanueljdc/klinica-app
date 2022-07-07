<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitoToxico extends Model
{
    use HasFactory;

    protected $table = 'habitos_toxicos';

    protected $fillable = [
        'habito_toxico', 
    ];
}
