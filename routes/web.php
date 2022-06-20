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




Route::group(['middleware' => ['auth']], function () {

    //Dashboard Route
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    //Property Page Get Routes
    Route::get('/property', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
    //Property Page Post Routes
    Route::post('/property/add', [App\Http\Controllers\PropertyController::class, 'store'])->name('property.store');
    Route::put('/property/update', [App\Http\Controllers\PropertyController::class, 'update'])->name('property.update');
    Route::post('/property/delete', [App\Http\Controllers\PropertyController::class, 'delete'])->name('property.delete');


    Route::get('/subscription', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription');
    Route::get('/subscription/users', [App\Http\Controllers\SubscriptionController::class, 'users'])->name('subscription.users');

    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('handleGatewayCallback');

});

/**
 *  Subscription middleware2 wrapper
 * uncomment this and comment the other to enable expired subscription
 * comment and uncomment to enable active subscription
 */

Route::group(['middleware' => ['auth', 'subscribed']], function () {
// Route::group(['middleware' => ['auth']], function () {

    // In App Section
    Route::get('/artisans', [App\Http\Controllers\ArtisansController::class, 'index'])->name('artisans.index');

    Route::get('/chatbox', [App\Http\Controllers\ChatBoxController::class, 'index'])->name('chats.index');

    Route::get('/invoice', [App\Http\Controllers\TenancyPaymentsController::class, 'invoice-generate'])->name('payments.invoice');

    //Settings Page Get Routes
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    //Settings Page Post Routes
    Route::post('/settings/addpropertycat', [App\Http\Controllers\SettingsController::class, 'addpropertycat'])->name('settings.addpropertycat');
    Route::post('/settings/addpropertytype', [App\Http\Controllers\SettingsController::class, 'addpropertytype'])->name('settings.addpropertytype');
    Route::post('/settings/addunitname', [App\Http\Controllers\SettingsController::class, 'addunitname'])->name('settings.addunitname');

    //Units Page Get Routes
    Route::get('/units', [App\Http\Controllers\PropertyUnitsController::class, 'index'])->name('units.index');
    //Units Page post Routes
    Route::post('/units/add', [App\Http\Controllers\PropertyUnitsController::class, 'store'])->name('units.store');
    Route::post('/units/update', [App\Http\Controllers\PropertyUnitsController::class, 'update'])->name('units.update');
    Route::post('/units/delete', [App\Http\Controllers\PropertyUnitsController::class, 'delete'])->name('units.delete');

    //tenants Page Get Routes
    Route::get('/tenants', [App\Http\Controllers\TenantsController::class, 'index'])->name('tenants.index');
    //tenants Page Post Routes
    Route::post('/tenants/add', [App\Http\Controllers\TenantsController::class, 'store'])->name('tenants.store');
    Route::post('/tenants/update', [App\Http\Controllers\TenantsController::class, 'update'])->name('tenants.update');
    Route::post('/tenants/delete', [App\Http\Controllers\TenantsController::class, 'delete'])->name('tenants.delete');

    //Users Page Get Routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    //Users Page Post Routes
    Route::post('/users/add', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

    //Payments Page get Routes
    Route::get('/tenancy-payments', [App\Http\Controllers\TenancyPaymentsController::class, 'index'])->name('payments.index');
    //Payments Page Post Routes
    Route::post('/tenancy-payments/add', [App\Http\Controllers\TenancyPaymentsController::class, 'store'])->name('payments.store');

    Route::get('/fetch-free-units', [App\Http\Controllers\AjaxRequestsController::class, 'fetch_free_units'])->name('fetch_free_units');
    Route::get('/fetch-unit', [App\Http\Controllers\AjaxRequestsController::class, 'fetch_unit'])->name('fetch_unit');
    Route::get('/fetch-tenant', [App\Http\Controllers\AjaxRequestsController::class, 'fetch_tenant'])->name('fetch_tenant');
});


require __DIR__ . '/auth.php';
