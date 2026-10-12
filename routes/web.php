<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\QueueBoardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return back();
})->name('locale');

Route::view('/my-cv', 'site.my_cv');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/projects', QueueBoardController::class)->name('projects');
Route::get('/queue', QueueBoardController::class)->name('queue');
Route::get('/about', QueueBoardController::class)->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('projects', ProjectController::class);
    });
