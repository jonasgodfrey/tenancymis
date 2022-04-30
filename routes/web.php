<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/', [DashboardController::class, 'index']);

// In App Section
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/property', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/units', [App\Http\Controllers\PropertyUnitsController::class, 'index'])->name('units.index');
Route::get('/tenants', [App\Http\Controllers\TenantsController::class, 'index'])->name('tenants.index');
Route::get('/tenancypayments', [App\Http\Controllers\TenancyPaymentsController::class, 'index'])->name('payments.index');
Route::get('/artisans', [App\Http\Controllers\ArtisansController::class, 'index'])->name('artisans.index');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/chatbox', [App\Http\Controllers\ChatBoxController::class, 'index'])->name('chats.index');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
Route::get('/invoice', [App\Http\Controllers\TenancyPaymentsController::class, 'invoicegenerate'])->name('payments.invoice');

require __DIR__.'/auth.php';