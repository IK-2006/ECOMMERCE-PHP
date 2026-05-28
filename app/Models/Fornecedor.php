<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = "fornecedores";
    // fillable - Insere informacoes em massa
    protected $fillable = [
        'nome',
        'telefone',
        'endereco',
    ];
}