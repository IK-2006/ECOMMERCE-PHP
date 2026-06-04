<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    protected $fillable = [
        'fornecedor_id',
        'preco',
        'quantidade',
        'nome',
        'tamanho',
        'marca',
        'imagem'
    ];

   

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

}