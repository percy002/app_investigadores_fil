<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResearcherController;
use App\Http\Controllers\ParticipationController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

// Route::get('/investigadores', function () {
//     return Inertia::render('researchers');
// })->name('researchers');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


Route::resource('participations', ParticipationController::class);


Route::resource('projects', ProjectController::class);

Route::resource('investigadores', ResearcherController::class);

