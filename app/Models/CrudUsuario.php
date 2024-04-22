<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudUsuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'curso',
        'tipo',
        'status',
        'telefone',
        'notas',
    ];

    protected $casts = [
        'notas'=> 'array',
    ];
}
