<?php

use App\Http\Middleware\EnsureTeamMembership;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::view('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')->name('invitations.accept');
});

// Route::get('/categoria', function () {
//     return redirect()->route('categorias.index');
// });

Route::resource('categorias', CategoriaController::class);

require __DIR__.'/settings.php';
