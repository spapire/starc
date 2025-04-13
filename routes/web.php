<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Global dashboard route
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->roles()->where('role_id', 2)->exists()) {
            return redirect()->route('seller.dashboard');
        } elseif ($user->roles()->where('role_id', 3)->exists()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('profile.home');
    })->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'home'])->name('profile.home');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });


    // Seller
    Route::middleware('role:seller')->prefix('seller')->group(function () {
        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('seller.dashboard');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/add', [ProductController::class, 'add'])->name('products.add');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        
        Route::get('/profile', [SellerController::class, 'index'])->name('seller.profile');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    });

    // Admin
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', function () {
            return view('admin.categories');
        })->name('admin.categories');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');

        Route::get('/reports', function () {
            return view('admin.reports');
        })->name('admin.reports');
    });
});

require __DIR__.'/auth.php';
