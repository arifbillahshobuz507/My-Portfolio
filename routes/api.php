<?php

use App\Http\Controllers\Api\Backend\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserInterface\Auth\AuthenticationController;
use App\Http\Middleware\TokenVerificationMiddleware;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Routes
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [AuthenticationController::class, 'userLogin']);
Route::post('/send-otp', [AuthenticationController::class, 'userSendOTP']);

Route::middleware(['tokenverification'])->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::post('/verify-otp', 'userVerifyOTP');
        Route::post('/reset-password', 'userResetPassword');
        Route::post('/logout', [AuthenticationController::class, 'userLogout'])->name('Logout');
    });
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::put('/update', 'updateUser');
        Route::get('/', 'userList');
        Route::delete('/destroy', 'deleteUser');
    });
});
