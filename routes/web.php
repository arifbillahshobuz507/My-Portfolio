<?php

use App\Http\Controllers\Web\UserInterface\Auth\AuthenticationController;
use App\Http\Controllers\Web\UserInterface\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\ProfileController;

Route::get('/', [HomeController::class, 'home'])->name('home');


// user Routes



Route::get('/registration', [AuthenticationController::class, 'userRegistrationPage'])->name('registration');
Route::get('/login', [AuthenticationController::class, 'userLoginPage'])->name('login');
Route::get('/send-otp', [AuthenticationController::class, 'userSendOTPPage'])->name('send-otp');
Route::get('/verify-otp', [AuthenticationController::class, 'userVerifyOTPPage']);


Route::middleware(['tokenverification'])->group(function () {
    Route::get('/reset-password', [AuthenticationController::class, 'userResetPasswordPage']);
    Route::get('/admin-dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin-profile', [ProfileController::class, 'profile'])->name('admin.profile');
});
Route::get('/master', [AuthenticationController::class, 'master']);




// Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
// Route::post('/delete', [UserController::class, 'deleteUser'])->name('user.delete');
// // View Routes
// Route::get('/', [UserController::class, 'index'])->name('user');
// Route::get('/add', [UserController::class, 'addUser'])->name('user.add');
// Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
// Route::get('/view/{id}', [UserController::class, 'viewUser'])->name('user.view');
