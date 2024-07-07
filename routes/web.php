<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
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

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');  

    Route::resource('products', ProductController::class);
    Route::get('/owned', [ProductController::class, 'owned'])->name('owned');

    Route::resource('lendings', LendingController::class);
    Route::get('/lendings', [LendingController::class, 'index'])->name('lendings.index');
    Route::get('/lendings/create/{product}', [LendingController::class, 'create'])->name('lendings.create');
    Route::post('/lendings', [LendingController::class, 'store'])->name('lendings.store');
    Route::patch('/lendings/{lending}/{status}', [LendingController::class, 'updateStatus'])->name('lendings.updateStatus');

    Route::resource('categories', CategoryController::class);
    
    Route::resource('reviews', ReviewController::class)->only(['store', 'edit', 'update', 'destroy']);
    Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

            Route::get('/users', [AdminController::class, 'users'])->name('users');
            Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
            Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
            Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
        
            Route::get('/products', [AdminController::class, 'products'])->name('products');
            Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
            Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
            Route::get('/lendings', [AdminController::class, 'lendings'])->name('lendings');
            Route::get('/lendings/{lending}/edit', [LendingController::class, 'edit'])->name('lendings.edit');
            Route::put('/lendings/{lending}', [AdminController::class, 'updateLending'])->name('lendings.update');
            Route::delete('/lendings/{lending}', [LendingController::class, 'destroy'])->name('lendings.destroy');
        
            Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
        
            Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
        
            Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        });
    });
});

require __DIR__.'/auth.php';
