<?php

use App\Http\Controllers\WEB\EkspresiController;
use App\Http\Controllers\WEB\AdminController;
use App\Http\Controllers\WEB\AudioController;
use App\Http\Controllers\WEB\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminController::class, 'create'])->name('login.form');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.index');
   Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/userList', [AdminController::class, 'index'])->name('users.userList');
    Route::get('/userAdd', [AdminController::class, 'add'])->name('users.form');
    Route::post('/userAdd', [AdminController::class, 'store'])->name('users.userAdd');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/userDelete/{id}', [AdminController::class, 'destroy'])->name('users.destroyUser');
   
   Route::get('/showEkspresi', [EkspresiController::class, 'show'])->name('ekspresi.showEkspresi');
    Route::get('/formEkspresi', [EkspresiController::class, 'form'])->name('ekspresi.form');
    Route::post('/formEkspresi', [EkspresiController::class, 'store'])->name('ekspresi.store');

    Route::get('/showAudio', [AudioController::class, 'showAudio'])->name('audio.showAudio');
    Route::get('/formAudio', [AudioController::class, 'formAudio'])->name('audio.form');
    Route::post('/formAudio', [AudioController::class, 'storeAudio'])->name('audio.storeAudio');
    Route::get('/editAudio/{id}', [AudioController::class, 'editAudio'])->name('audio.editAudio');
    Route::post('/updateAudio/{id}', [AudioController::class, 'updateAudio'])->name('audio.updateAudio');
    Route::delete('/audio/{id}', [AudioController::class, 'destroyAudio'])->name('audio.destroyAudio');

 
});
