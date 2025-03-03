
<?php

use App\Http\Controllers\Backend\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Author\AuthorDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('register', [AuthController::class, 'register'])->name('register');
    // Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    // Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');



    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});



Route::group(['prefix' => 'author', 'middleware' => ['auth', 'author'], 'as' => 'author.'], function () {
    Route::get('dashboard', [AuthorDashboardController::class, 'dashboard'])->name('dashboard');
});
