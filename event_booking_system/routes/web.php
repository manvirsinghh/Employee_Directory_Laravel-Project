<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventSearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\User\EventsController;

// Route::get('/', function () {
//     $events = \App\Models\Event::latest()->take(4)->get(); // featured events
//     return view('home', compact('events'));
// });
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Only admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// Users and admins
// Route::middleware(['auth', 'role:user,admin'])->group(function () {
//     Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
// });
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', fn() => view('user.dashboard'))->name('dashboard');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');


});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category/{id}', [EventController::class, 'eventsByCategory'])->name('events.byCategory');

Route::get('/events/search', [EventSearchController::class, 'search'])->name('events.search');
Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/checkin/{id}', [BookingController::class, 'checkin'])->name('bookings.checkin');

Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::post('/checkout/{event}', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/checkout/success/{event}', [StripeController::class, 'success'])->name('stripe.success');

    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::get('/my-bookings',[BookingController::class,'myBookings'])->name('bookings.my');
Route::get('/bookings/{booking}/download', [BookingController::class, 'downloadTicket'])->name('bookings.download');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
});
