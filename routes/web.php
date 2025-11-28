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
    
    // Calendar Routes
    Route::get('/calendario', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendario.index');
    Route::get('/calendario/events', [App\Http\Controllers\CalendarController::class, 'getEvents'])->name('calendario.events');
    Route::post('/calendario/store', [App\Http\Controllers\CalendarController::class, 'store'])->name('calendario.store');
    Route::put('/calendario/update/{id}', [App\Http\Controllers\CalendarController::class, 'update'])->name('calendario.update');
    Route::delete('/calendario/{id}', [App\Http\Controllers\CalendarController::class, 'destroy'])->name('calendario.destroy');
});
