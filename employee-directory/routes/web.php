<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('employees',EmployeeController::class);
Route::resource('departments',DepartmentController::class);
Route::get('register',[AuthController::class,'showRegister'])->name('register');
Route::post('register',[AuthController::class,'register']);
Route::get('login',[AuthController::class,'showLogin'])->name('login');
Route::post('login',[AuthController::class,'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
});