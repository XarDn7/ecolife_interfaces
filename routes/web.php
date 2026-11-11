<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CollectorController;

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

require __DIR__.'/auth.php';

Route::resource('warehouse', WarehouseController::class);

// Rutas del Rol del Recolector
Route::get('/collector', [CollectorController::class, 'index'])->name('collector.index');
Route::post('/collector/close', [CollectorController::class, 'closeTicket'])->name('collector.close');
Route::get('/educativo', function () {
    return view('educative.educativo');
})->name('collector.educativo');