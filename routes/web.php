<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::get('/admin', [ProductController::class, 'index'])->name('product.index');
    Route::get('/admin/product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/admin/product/{id}/show', [ProductController::class, 'show'])->name('product.show');

    Route::patch('/admin/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/admin/product/{id}/destoy', [ProductController::class, 'destroy'])->name('product.destroy');
    
});

require __DIR__ . '/auth.php';

