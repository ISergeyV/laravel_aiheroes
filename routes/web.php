<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AiNewsController;
use Illuminate\Support\Facades\Route;

// --- Публичные маршруты (для всех посетителей) ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Pages

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/orange-county-flooring-handyman', fn() => redirect('/'))->name('pages.flooring');
Route::get('/orange-county-painting-handyman', fn() => redirect('/'))->name('pages.painting');
Route::get('/orange-county-drywall-handyman', fn() => redirect('/'))->name('pages.drywall');
Route::get('/orange-county-furniture-handyman', fn() => redirect('/'))->name('pages.furniture');
Route::get('/orange-county-tile-handyman', fn() => redirect('/'))->name('pages.tile');

Route::get('/mro-case-study', fn() => view('pages.mro-case-study'))->name('pages.mro-case-study');
Route::redirect('/mro-case-study.html', '/mro-case-study');

Route::get('/news', [AiNewsController::class, 'index'])->name('ai-news.index');

Route::get('/estimate', [LeadController::class, 'show'])->name('lead.form');
Route::post('/estimate', [LeadController::class, 'submit'])->name('lead.submit');

Route::get('/estimate/thank-you', function () {
    return view('pages.thank-you');
})->name('lead.thankyou');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Этот маршрут должен оставаться в конце, чтобы он ловил все кастомные страницы
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
