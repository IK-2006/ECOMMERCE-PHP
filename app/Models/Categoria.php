<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(
            Produto::class,
            '_categoria_produto',
            'categoria_id',
            'produto_id'
        );
    }
}