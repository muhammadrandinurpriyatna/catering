<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect()->route('sign-in');
});
Route::get('sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('sign-in', [AuthController::class, 'signInAction']);
Route::get('sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::post('sign-up', [AuthController::class, 'signUpAction']);

Route::middleware('auth')->group(function () {
    Route::get('/sign-out', [AuthController::class, 'signOut'])->name('sign-out');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'profileAction']);
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
    Route::get('/menu/add', [MenuController::class, 'add'])->name('menu.add');
    Route::post('/menu/add', [MenuController::class, 'addAction']);
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/edit/{id}', [MenuController::class, 'editAction']);
    Route::get('/order', [OrderController::class, 'order'])->name('order');

    Route::get('/catering', [CateringController::class, 'catering'])->name('catering');
    Route::get('/catering/{id}', [CateringController::class, 'cateringDetail'])->name('catering.detail');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/cart/order', [CartController::class, 'order'])->name('cart.order');
    Route::post('/cart/{menu_id}', [CartController::class, 'cartAction'])->name('cart.add');
});