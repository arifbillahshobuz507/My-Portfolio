<?php

use App\Http\Controllers\Api\Admin\EducationController;
use App\Http\Controllers\Api\Admin\ExperienceController;
use App\Http\Controllers\Api\Admin\ProjectController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserInterface\Auth\AuthenticationController;
use App\Http\Controllers\Api\Admin\ServiceController;
use App\Http\Controllers\Api\Admin\SkillController;

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
        Route::get('/list', 'userList');
        Route::put('/update', 'updateUser');
        Route::delete('/destroy', 'deleteUser');
    });
    Route::controller(UserProfileController::class)->prefix('user-profile')->group(function () {
        Route::get('/', 'userProfile');
        Route::post('/store', 'store');
    });
    Route::controller(ServiceController::class)->prefix('services')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    Route::controller(ProjectController::class)->prefix('projects')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    
    Route::controller(ExperienceController::class)->prefix('experiences')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
      Route::controller(EducationController::class)->prefix('education')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
      Route::controller(SkillController::class)->prefix('skills')->group(function () {
        Route::get('/list', 'list');
        Route::post('/store', 'store');
        Route::put('/update', 'update');
        Route::delete('/destroy', 'delete');
    });
    
});
