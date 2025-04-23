<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::get('/template', [TemplateController::class, 'index']);

// Rooms Routes

Route::get('/', [RoomsController::class, 'list'])->name('home');
Route::get('/rooms/{Name}', [RoomsController::class, 'detail']);

// Register Routes

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::get('/register-landlord', [RegisterController::class, 'showLandlordForm'])->name('register-landlord');
Route::post('/register-landlord', [RegisterController::class, 'registerLandlord'])->name('register.landlord.submit');

Route::get('/register-renter', [RegisterController::class, 'showRenterForm'])->name('register-renter');
Route::post('/register-renter', [RegisterController::class, 'registerRenter'])->name('register.renter.submit');

// Login Routes

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::get('/login-landlord', [LoginController::class, 'showLandlordLogin'])->name('login-landlord');
Route::post('/login-landlord', [LoginController::class, 'LoginLandlord'])->name('login.landlord.submit');

Route::get('/login-renter', [LoginController::class, 'showRenterLogin'])->name('login-renter');
Route::post('/login-renter', [LoginController::class, 'LoginRenter'])->name('login.renter.submit');

// Account Routes

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.submit');
