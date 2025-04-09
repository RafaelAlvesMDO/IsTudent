<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\RoomsController;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

// Routes - Without Controllers

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/register-renter', function () {
    return view('register-renter');
});

Route::get('/register-landlord', function () {
    return view('register-landlord');
});

// Routes - With Controllers

Route::get('/template', [TemplateController::class, 'index']);
Route::get('/', [RoomsController::class, 'list'])->name('home');
Route::get('/rooms/{Name}', [RoomsController::class, 'detail']);
