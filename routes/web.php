<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'site.home')->name('home');
Route::view('/antrian', 'site.antrian')->name('antrian');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
