<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// New and Existing User Section
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('auth.index');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('auth.index');

// Sign in Authentication Route
Route::get('/recover', [App\Http\Controllers\Auth\RecoverpwdController::class, 'index'])->name('auth.index');
Route::get('/otp', [App\Http\Controllers\Auth\OtpAuthController::class, 'index'])->name('auth.index');
Route::get('/confirm', [App\Http\Controllers\Auth\OtpAuthController::class, 'confirm'])->name('auth.confirm');

// In App Section
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/property', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');

