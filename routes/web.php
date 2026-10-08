<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\QueueBoardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'site.home')->name('home');
Route::get('/antrian', QueueBoardController::class)->name('antrian');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->only(['index', 'store']);
    Route::get('/queue', [QueueController::class, 'index'])->name('queue.index');
    Route::patch('/queue/{project}/start', [QueueController::class, 'start'])->name('queue.start');
    Route::patch('/queue/{project}/finish', [QueueController::class, 'finish'])->name('queue.finish');
    Route::resource('services', ServiceController::class)->only('index');
    Route::resource('clients', ClientController::class)->only('index');
    Route::resource('reviews', ReviewController::class)->only('index');
});
