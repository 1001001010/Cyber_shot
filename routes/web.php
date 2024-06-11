<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware(['auth', 'verified']);

Route::get('/category/{category_name}', [ProfileController::class, 'profile'])->name('profile');

Route::put('/new_avatar', [ProfileController::class, 'avatar'])->name('NewAvatar')->middleware(['auth']);

require __DIR__.'/auth.php';
