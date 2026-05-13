<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fornecedor_id');
            $table->timestamps();
            $table->decimal('preco');
            $table->integer('quantidade');
            $table->string('nome');
            $table->string('tamanho');
            $table->string('marca');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};