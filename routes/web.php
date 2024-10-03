<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxesController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/locations', function () {
        return view('locations');
    })->name('locations');
});

require __DIR__.'/auth.php';



Route::get('/locations', [BoxesController::class, 'index']);
Route::post('/web/boxes/{box}/toggle-status', [BoxesController::class, 'toggleStatus'])->name('boxes.toggleStatus');