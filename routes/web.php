<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function () {

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories');
        Route::get('/category/{category:slug}', 'show')->name('category');
    });

    Route::get('tool/{tool:slug}', [ToolController::class, 'show'])->name('tool');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/manage/tools', 'listTools')->name('manage-tools');
        Route::get('/manage/users', 'listUsers')->name('manage-users');
        Route::get('/manage/reviews', 'listReviews')->name('manage-reviews');
        Route::get('/manage/replies', 'listReplies')->name('manage-replies');
        Route::get('/manage/rentals', 'listRentals')->name('manage-rentals');
    });
    Route::view('profile', 'profile')->name('profile');
});


// Route::get('/', [CategoryController::class, 'index'])->name('categories')->middleware(['auth', 'verified']);
// Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category');
// Route::get('tool/{tool:slug}', [ToolController::class, 'show'])->middleware(['auth', 'verified'])->name('tool');

// Route::get('/manage/tools', [AdminController::class, 'listTools'])->middleware(['auth', 'verified'])->name('manage-tools');
// Route::get('/manage/users', [AdminController::class, 'listUsers'])->middleware(['auth', 'verified'])->name('manage-users');
// Route::get('/manage/reviews', [AdminController::class, 'listReviews'])->middleware(['auth', 'verified'])->name('manage-reviews');
// Route::get('/manage/replies', [AdminController::class, 'listReplies'])->middleware(['auth', 'verified'])->name('manage-replies');

// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__ . '/auth.php';
