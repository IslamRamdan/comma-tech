<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// use App\Http\Controllers\Admin\PostController;

// مسارات لوحة التحكم والمقالات
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // لوحة التحكم الرئيسية (يمكن توجيهها لصفحة المقالات مباشرة أو لوحة الإدارة)
    Route::get('/', function () {
        return view('admin.posts.index');
    })->name('home');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});


Route::get('/blog', [PostController::class, 'inde'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
require __DIR__ . '/auth.php';
