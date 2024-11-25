<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('/admin')->name('admin.')->group(function() {
        Route::get('/users', [UserController::class, 'index'])->name('users');

        Route::prefix('/products')->name('products.')->group(function() {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            // Route::post('/', [ProductController::class, 'store'])->name('store');
            // Route::put('/{product}', [ProductController::class, 'update'])->name('update');
            // Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        });
    });
});


require __DIR__.'/auth.php';
