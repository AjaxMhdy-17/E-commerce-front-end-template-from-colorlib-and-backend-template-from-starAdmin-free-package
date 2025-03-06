<?php

use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Frontend\Account\UserDashboardController;
use App\Http\Controllers\Frontend\Auth\AuthController as FrontAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::middleware('guest.admin')->group(function () {
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(['prefix' => 'product', 'as' => 'product.'] , function () {
            Route::resource('category', ProductCategoryController::class);
            Route::resource('sub-category', ProductSubCategoryController::class);
        });
    });
});



Route::group(['as' => 'user.'], function () {


    Route::get('', function () {
        return view('front.pages.home.home');
    })->name('home');


    Route::get('contact', function () {
        return view('front.pages.contact.index');
    })->name('contact');


    Route::middleware('guest.authentic')->group(function () {
        Route::get('register', [FrontAuthController::class, 'register'])->name('register');
        Route::post('register', [FrontAuthController::class, 'registerStore'])->name('register.store');
        Route::get('login', [FrontAuthController::class, 'login'])->name('login');
        Route::post('login', [FrontAuthController::class, 'loginStore'])->name('login.store');
        Route::get('forget-password', [FrontAuthController::class, 'forgetPassword'])->name('forget.password');
        Route::post('forget-password', [FrontAuthController::class, 'forgetPasswordStore'])->name('forget.password.store');
    });

    Route::middleware('authentic')->group(function () {
        Route::post('logout', [FrontAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    });
});
