<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- Публичные маршруты (для всех посетителей) ---
Route::get('/', function () {
    return view('pages.index'); // или название вашей главной страницы
})->name('home');

Route::get('/tile-flooring', fn() => view('pages.tile-flooring'))->name('pages.tile');

Route::get('/estimate', [LeadController::class, 'show'])->name('lead.form');
Route::post('/estimate', [LeadController::class, 'submit'])->name('lead.submit');

Route::get('/estimate/thank-you', function () {
    return view('pages.thank-you');
})->name('lead.thankyou');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
