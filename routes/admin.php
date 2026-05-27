<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ServiceController;

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home');
    Route::group(['prefix'=>'service','as'=>'service.'], function(){
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/list', [ServiceController::class, 'list'])->name('list');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('store', [ServiceController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ServiceController::class, 'delete'])->name('delete');
    });

    

