<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = ['user_id', 'produto_id', 'quantidade', 'preco_unitario'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
    
    public function getSubtotalAttribute()
    {
        return $this->quantidade * $this->preco_unitario;
    }
}