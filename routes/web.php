<?php

use App\Http\Controllers\backend\AboutMesController;
use App\Http\Controllers\backend\ContactsController;
use App\Http\Controllers\backend\EducationExperienceSkillsController;
use App\Http\Controllers\backend\HeroPropertiesController;
use App\Http\Controllers\backend\ProjectsController;
use App\Http\Controllers\backend\ResumeController;
use App\Http\Controllers\backend\ServicesController;
use App\Http\Controllers\backend\SkillsController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\HomeControlller;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeControlller::class, 'home'])->name('home')->middleware('tokenverification');

// user Routes

    // API Routes
    Route::post('/user-registration',[UserController::class,'userRegistration']);
    Route::post('/user-login',[UserController::class,'userLogin']);
    Route::post('/send-otp',[UserController::class,'userSendOTP']);
    Route::post('/verify-otp',[UserController::class,'userVerifyOTP']);
    Route::post('/reset-password',[UserController::class,'userResetPassword'])->middleware('tokenverification');

    Route::get('/registration',[UserController::class,'userRegistrationPage']);
    Route::get('/login',[UserController::class,'userLoginPage']);
    Route::get('/send-otp',[UserController::class,'userSendOTPPage']);
    Route::get('/verify-otp',[UserController::class,'userVerifyOTPPage']);
    Route::get('/reset-password',[UserController::class,'userResetPasswordPage'])->middleware('tokenverification');

// // rabbil vai work
// Route::post('/user-registration',[UserController::class,'UserRegistration']);
// Route::post('/user-login',[UserController::class,'UserLogin']);
// Route::post('/send-otp',[UserController::class,'SendOTPCode']);
// Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
// Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
// Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
// Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);




    // Route::post('/update/{id}',[UserController::class, 'updateUser'])->name('user.update');
    // Route::post('/delete',[UserController::class, 'deleteUser'])->name('user.delete');
    //View Routes
    // Route::get('/', [UserController::class, 'index'])->name('user');
    // Route::get('/add', [UserController::class, 'addUser'])->name('user.add');
    // Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    // Route::get('/view/{id}', [UserController::class, 'viewUser'])->name('user.view');

