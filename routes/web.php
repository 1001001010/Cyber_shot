<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware(['auth', 'verified']);

Route::get('/category/{category_name}', [HomeController::class, 'open_category'])->name('OpenCategory');

Route::get('/product/{product_id}', [HomeController::class, 'open_product'])->name('OpenProduct');

Route::get('/buy/{product_id}', [HomeController::class, 'buy_product'])->name('BuyProduct');

Route::put('/new_avatar', [ProfileController::class, 'avatar'])->name('NewAvatar')->middleware(['auth']);

Route::post('/admin/product/add', [AdminController::class, 'addProduct'])->name('AddProduct')->middleware(IsAdmin::class);

Route::post('/edit_name', [ProfileController::class, 'edit_name'])->name('EditName')->middleware(['auth']);

Route::get('/admin', [AdminController::class, 'index'])->name('OpenAdmin')->middleware(IsAdmin::class, 'auth');

Route::get('/basket', [ProfileController::class, 'basket_open'])->name('Basket')->middleware(['auth']);

Route::get('/basket/{tovar_id}', [ProfileController::class, 'add_basket'])->name('AddBasket')->middleware(['auth']);

require __DIR__.'/auth.php';
