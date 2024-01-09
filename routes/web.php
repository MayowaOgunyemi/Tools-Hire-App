<?php

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
Route::get('/', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('tool/{tool:slug}', [ToolController::class, 'show'])->middleware(['auth', 'verified'])->name('tool');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
