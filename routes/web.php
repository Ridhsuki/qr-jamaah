<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PilgrimController;
use App\Http\Controllers\Public\ScanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/scan/{pilgrim}', [ScanController::class, 'show'])->name('scan.show');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.pilgrims.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('pilgrims', PilgrimController::class);
        Route::get('pilgrims/{pilgrim}/print', [PilgrimController::class, 'print'])
            ->name('pilgrims.print');
    });
});

require __DIR__ . '/auth.php';
