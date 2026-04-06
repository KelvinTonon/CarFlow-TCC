<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\DashboardController;
use PhpParser\Builder\Function_;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clientes', ClienteController::class);
Route::resource('veiculos', VeiculoController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('agendamentos', AgendamentoController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

route::get('/veiculos-por-cliente/{cliente_id}', function ($cliente_id){ 
    return \App\Models\Veiculo::where('cliente_id', $cliente_id)->get();
});

require __DIR__.'/auth.php';
