<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->id();
            
            // Usuário dono do carrinho (nullable para carrinhos de visitantes/sessão)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            
            // Produto no carrinho
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            
            // Quantidade do produto
            $table->integer('quantidade')->default(1);
            
            // Preço no momento da adição (importante para não mudar se o preço do produto mudar depois)
            $table->decimal('preco_unitario', 10, 2); 
            
            $table->timestamps();
            
            // Índice para buscar carrinhos de usuários rapidamente
            $table->index(['user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrinho');
    }
};
