<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.submit');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [Logincontroller::class, 'handleLogin'])->name('login.submit');
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
// Admin dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::middleware(['auth'])->get('/dashboard', function () {
    $blogs = Blog::latest()->get();
    return view('dashboard', compact('blogs'));
})->name('dashboard');  // 👈 This name must match what your controller is calling




// Authenticated users (can comment)
Route::middleware(['auth'])->group(function () {
    Route::post('/blogs/{blog}/comment', [CommentController::class, 'store'])->name('comments.store');
});

// Admin only (can manage blogs)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('blogs.index');

    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/admin/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/admin/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/admin/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});
Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
// Starting page
Route::get('/', [BlogController::class, 'landing'])->name('home');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
