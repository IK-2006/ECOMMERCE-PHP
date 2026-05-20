<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    // fillable - Insere informacoes em massa
    protected $fillable = [
        'nome'
    ];
}