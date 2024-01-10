<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');
Route::get('/', [CategoryController::class, 'index'])->name('categories')->middleware(['auth', 'verified']);
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('tool/{tool:slug}', [ToolController::class, 'show'])->middleware(['auth', 'verified'])->name('tool');

Route::get('/manage/tools', [AdminController::class, 'listTools'])->middleware(['auth', 'verified'])->name('manage-tools');
Route::get('/manage/users', [AdminController::class, 'listUsers'])->middleware(['auth', 'verified'])->name('manage-users');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
