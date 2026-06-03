<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::view('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')->name('invitations.accept');
});

 Route::get('/categoria', function () {
     return redirect()->route('categoria.index');
 });

Route::resource('categoria', CategoriaController::class);


 Route::get('/fornecedor', function () {
     return redirect()->route('fornecedor.index');
 });

Route::resource('fornecedor', FornecedorController::class);



 Route::get('/produto', function () {
     return redirect()->route('produto.index');
 });

Route::resource('produto', ProdutoController::class);

require __DIR__.'/settings.php';
