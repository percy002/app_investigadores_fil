<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::resource('projects', App\Http\Controllers\ProjectController::class);

Route::resource('investigadores', App\Http\Controllers\ResearcherController::class)
    ->names([
        'index'   => 'researchers.index',
        'create'  => 'researchers.create',
        'store'   => 'researchers.store',
        'show'    => 'researchers.show',
        'edit'    => 'researchers.edit',
        'update'  => 'researchers.update',
        'destroy' => 'researchers.destroy',
    ]);
Route::resource('participations', App\Http\Controllers\ParticipationController::class);
