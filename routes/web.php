<?php

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeControlller;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeControlller::class, 'home'])->name('home');
Route::get('/dashbord', [HomeController::class, 'dashbord'])->name('home')->middleware('tokenverification');

// user Routes

// API Routes
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::post('/send-otp', [UserController::class, 'userSendOTP']);
Route::post('/verify-otp', [UserController::class, 'userVerifyOTP']);
Route::post('/reset-password', [UserController::class, 'userResetPassword']);
Route::post('/logout', [UserController::class, 'userLogout'])->middleware('tokenverification')->name('Logout');

Route::get('/registration', [UserController::class, 'userRegistrationPage']);
Route::get('/login', [UserController::class, 'userLoginPage']);
Route::get('/send-otp', [UserController::class, 'userSendOTPPage']);
Route::get('/verify-otp', [UserController::class, 'userVerifyOTPPage']);
Route::get('/reset-password', [UserController::class, 'userResetPasswordPage']);

Route::group(['prefix'=>'service','as'=>'service.'], function(){
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/list', [ServiceController::class, 'list'])->name('list');
    Route::get('/create', [ServiceController::class, 'create'])->name('create');
    Route::post('store', [ServiceController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [ServiceController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ServiceController::class, 'delete'])->name('delete');
});



// Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
// Route::post('/delete', [UserController::class, 'deleteUser'])->name('user.delete');
// // View Routes
// Route::get('/', [UserController::class, 'index'])->name('user');
// Route::get('/add', [UserController::class, 'addUser'])->name('user.add');
// Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
// Route::get('/view/{id}', [UserController::class, 'viewUser'])->name('user.view');
