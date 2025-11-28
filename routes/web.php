<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/campanas', [App\Http\Controllers\CampaignController::class, 'index'])->name('campanas.index');
    Route::get('/audios', [App\Http\Controllers\AudioController::class, 'index'])->name('audios.index');
    Route::get('/historial', [App\Http\Controllers\HistoryController::class, 'index'])->name('historial.index');
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
    Route::get('/configuracion', [App\Http\Controllers\SettingsController::class, 'index'])->name('configuracion.index');
});
