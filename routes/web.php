<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Mail\TestMailable;
use Illuminate\Support\Facades\Mail;
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


    Route::get('/mi-carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart-store/{id}', [CartController::class, 'store'])->name('cart.store');



    /* Route::get('testmail', function(){
        
        Mail::to('santi03956@gmail.com')
            ->send(new TestMailable);

            return "Mensaje enviado";

    })->name('testmail'); */
    
});

require __DIR__ . '/auth.php';

