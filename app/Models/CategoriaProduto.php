<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoriaProduto extends Model
{
    protected $table = '_categoria_produto';

    protected $fillable = [
        'produto_id',
        'categoria_id',
    ];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

}