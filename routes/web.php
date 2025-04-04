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

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/template', [TemplateController::class, 'index']);
Route::get('/', [RoomsController::class, 'list']);
Route::get('/rooms/{Name}', [RoomsController::class, 'detail']);

