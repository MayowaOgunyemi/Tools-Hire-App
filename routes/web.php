<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
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

require __DIR__ . '/auth.php';
