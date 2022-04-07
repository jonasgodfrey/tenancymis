<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\PlazaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth Routes
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::post('/verify_otp', [ApiAuthController::class, 'verify_otp'])->middleware('auth:sanctum');
Route::get('/notifications', [NotificationController::class, 'notifications'])->middleware('auth:sanctum');

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    //Plaza Routes
    Route::get('/plaza', [PlazaController::class, 'fetch']);
    Route::post('/plaza/create', [PlazaController::class, 'create']);
    Route::put('/plaza/update', [PlazaController::class, 'update']);
    Route::post('/plaza/delete', [PlazaController::class, 'delete']);

});

