<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware(['auth', 'verified']);

Route::get('/category/{category_name}', [ProductController::class, 'open_category'])->name('OpenCategory');

Route::put('/new_avatar', [ProfileController::class, 'avatar'])->name('NewAvatar')->middleware(['auth']);

Route::get('/admin', [AdminController::class, 'index'])->name('OpenAdmin')->middleware(IsAdmin::class);

require __DIR__.'/auth.php';
