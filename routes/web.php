<?php

use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\Web\UserInterface\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');


// user Routes



Route::get('/registration', [UserController::class, 'userRegistrationPage']);
Route::get('/login', [UserController::class, 'userLoginPage']);
Route::get('/send-otp', [UserController::class, 'userSendOTPPage']);
Route::get('/verify-otp', [UserController::class, 'userVerifyOTPPage']);
Route::get('/reset-password', [UserController::class, 'userResetPasswordPage']);






// Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
// Route::post('/delete', [UserController::class, 'deleteUser'])->name('user.delete');
// // View Routes
// Route::get('/', [UserController::class, 'index'])->name('user');
// Route::get('/add', [UserController::class, 'addUser'])->name('user.add');
// Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
// Route::get('/view/{id}', [UserController::class, 'viewUser'])->name('user.view');
