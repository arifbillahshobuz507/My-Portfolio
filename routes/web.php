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
//login after routes
Route::middleware(['webTokenverification'])->group(function () {
    Route::get('/reset-password', [AuthenticationController::class, 'userResetPasswordPage']);

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    });
});




// Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
// Route::post('/delete', [UserController::class, 'deleteUser'])->name('user.delete');
// // View Routes
// Route::get('/', [UserController::class, 'index'])->name('user');
// Route::get('/add', [UserController::class, 'addUser'])->name('user.add');
// Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
// Route::get('/view/{id}', [UserController::class, 'viewUser'])->name('user.view');
