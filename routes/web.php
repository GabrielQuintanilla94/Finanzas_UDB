<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\ReporteBalanceController;

Route::get('/', function () {
    return redirect()->route('login'); // Te enviará directo al login
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\EntradaController;

Route::get('/entradas/registrar', [EntradaController::class, 'create'])->middleware(['auth'])->name('entradas.create');

Route::post('/entradas', [EntradaController::class, 'store'])->middleware(['auth'])->name('entradas.store');

Route::get('/entradas', [EntradaController::class, 'index'])->middleware(['auth'])->name('entradas.index');

Route::get('/salidas/registrar', [SalidaController::class, 'create'])->middleware(['auth'])->name('salidas.create');

Route::post('/salidas', [SalidaController::class, 'store'])->middleware(['auth'])->name('salidas.store');

Route::get('/salidas', [SalidaController::class, 'index'])->middleware(['auth'])->name('salidas.index');

Route::get('/balance', [ReporteBalanceController::class, 'index'])->name('balance.index');

Route::delete('/entradas/{entrada}', [EntradaController::class, 'destroy'])->name('entradas.destroy');

Route::delete('/salidas/{salida}', [SalidaController::class, 'destroy'])->name('salidas.destroy');

// Rutas para el Balance y PDF
    Route::get('/balance', [ReporteBalanceController::class, 'index'])->name('balance.index');
    Route::get('/balance/pdf', [ReporteBalanceController::class, 'exportPdf'])->name('balance.pdf');