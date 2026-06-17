<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\LojaController;   

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::view('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('categoria', CategoriaController::class);
    
    // Rota para exibir o carrinho (GET)
    Route::get('userview/carrinho', [LojaController::class, 'carrinho'])->name('userview.carrinho.index');   
    
    // Rota para adicionar ao carrinho (POST) <-- ADICIONE ESTA LINHA
    Route::post('carrinho/adicionar', [LojaController::class, 'adicionarAoCarrinho'])->name('carrinho.adicionar');

    Route::resource('fornecedor', FornecedorController::class);
    Route::resource('produto', ProdutoController::class);
    Route::resource('categoriaprodutos', CategoriaProdutoController::class);
    Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')->name('invitations.accept');
    Route::get('userview', [LojaController::class, 'index'])->name('userview.index');
});   

require __DIR__.'/settings.php';   