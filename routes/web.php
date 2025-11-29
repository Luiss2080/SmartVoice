<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/campanas', [App\Http\Controllers\CampaignController::class, 'index'])->name('campanas.index');
    Route::get('/audios', [App\Http\Controllers\AudioController::class, 'index'])->name('audios.index');
    Route::get('/audios/crear', [App\Http\Controllers\AudioController::class, 'create'])->name('audios.create');
    Route::post('/audios', [App\Http\Controllers\AudioController::class, 'store'])->name('audios.store');
    Route::get('/audios/{id}/editar', [App\Http\Controllers\AudioController::class, 'edit'])->name('audios.edit');
    Route::put('/audios/{id}', [App\Http\Controllers\AudioController::class, 'update'])->name('audios.update');
    Route::delete('/audios/{id}', [App\Http\Controllers\AudioController::class, 'destroy'])->name('audios.destroy');
    Route::get('/historial', [App\Http\Controllers\HistoryController::class, 'index'])->name('historial.index');
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/configuracion', [App\Http\Controllers\SettingsController::class, 'index'])->name('configuracion.index');
    Route::put('/configuracion', [App\Http\Controllers\SettingsController::class, 'update'])->name('configuracion.update');
    
    // Profile Routes
    Route::get('/perfil/ver', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/perfil', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    // Calendar Routes
    Route::get('/calendario', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendario.index');
    Route::get('/calendario/events', [App\Http\Controllers\CalendarController::class, 'getEvents'])->name('calendario.events');
    Route::post('/calendario/store', [App\Http\Controllers\CalendarController::class, 'store'])->name('calendario.store');
    Route::put('/calendario/update/{id}', [App\Http\Controllers\CalendarController::class, 'update'])->name('calendario.update');
    Route::delete('/calendario/{id}', [App\Http\Controllers\CalendarController::class, 'destroy'])->name('calendario.destroy');

    // Campaign Routes
    Route::resource('campanas', App\Http\Controllers\CampanaController::class);
    Route::post('/campanas/{id}/audios', [App\Http\Controllers\CampanaController::class, 'uploadAudio'])->name('campanas.uploadAudio');
});
