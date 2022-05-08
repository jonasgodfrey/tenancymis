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

Route::get('/tenancypayments', [App\Http\Controllers\TenancyPaymentsController::class, 'index'])->name('payments.index');

Route::get('/artisans', [App\Http\Controllers\ArtisansController::class, 'index'])->name('artisans.index');

Route::get('/chatbox', [App\Http\Controllers\ChatBoxController::class, 'index'])->name('chats.index');


Route::group(['middleware' => ['auth']], function () {

    //Settings Page Get Routes
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    //Settings Page Post Routes
    Route::post('/settings/addpropertycat', [App\Http\Controllers\SettingsController::class, 'addpropertycat'])->name('settings.addpropertycat');
    Route::post('/settings/addpropertytype', [App\Http\Controllers\SettingsController::class, 'addpropertytype'])->name('settings.addpropertytype');
    Route::post('/settings/addunitname', [App\Http\Controllers\SettingsController::class, 'addunitname'])->name('settings.addunitname');

    //Property Page Get Routes
    Route::get('/property', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
    //Property Page Post Routes
    Route::post('/property/add', [App\Http\Controllers\PropertyController::class, 'store'])->name('property.store');
    Route::put('/property/update', [App\Http\Controllers\PropertyController::class, 'update'])->name('property.update');
    Route::post('/property/delete', [App\Http\Controllers\PropertyController::class, 'delete'])->name('property.delete');

    //Units Page Get Routes
    Route::get('/units', [App\Http\Controllers\PropertyUnitsController::class, 'index'])->name('units.index');
    //Units Page post Routes
    Route::post('/units/add', [App\Http\Controllers\PropertyUnitsController::class, 'store'])->name('units.store');
    Route::post('/units/update', [App\Http\Controllers\PropertyUnitsController::class, 'update'])->name('units.update');
    Route::post('/units/delete', [App\Http\Controllers\PropertyUnitsController::class, 'delete'])->name('units.delete');

    //tenants Page Get Routes
    Route::get('/tenants', [App\Http\Controllers\TenantsController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/fetch-units', [App\Http\Controllers\TenantsController::class, 'fetch_units'])->name('tenants.fetch_units');
    //tenants Page Post Routes
    Route::post('/tenants/add', [App\Http\Controllers\TenantsController::class, 'store'])->name('tenants.store');
    Route::post('/tenants/update', [App\Http\Controllers\TenantsController::class, 'update'])->name('tenants.update');
    Route::post('/tenants/delete', [App\Http\Controllers\TenantsController::class, 'delete'])->name('tenants.delete');

    //Users Page Get Routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    //Users Page Post Routes
    Route::post('/users/add', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
});

//Manager
Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');

// Tenants
Route::get('/tenantsdash', [App\Http\Controllers\TenantsController::class, 'tenantsdashboard'])->name('tenants.index');

// Accountants
Route::get('/accountant', [App\Http\Controllers\AccountantsController::class, 'index'])->name('accountant.index');

// Artisans
Route::get('/artisandash', [App\Http\Controllers\ArtisansController::class, 'artisansdash'])->name('artisans.index');


Route::get('/invoice', [App\Http\Controllers\TenancyPaymentsController::class, 'invoicegenerate'])->name('payments.invoice');

require __DIR__ . '/auth.php';
