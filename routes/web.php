<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'site.home')->name('home');
Route::view('/antrian', 'site.antrian')->name('antrian');
Route::prefix('admin')->name('admin.')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/projects', 'projects')->name('projects.index');
    Route::get('/services', 'services')->name('services.index');
    Route::get('/clients', 'clients')->name('clients.index');
    Route::get('/reviews', 'reviews')->name('reviews.index');
});
