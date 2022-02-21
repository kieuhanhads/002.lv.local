<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(UserController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginStore');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerStore');
    Route::get('forgot', 'forgot')->name('forgot');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('post')->controller(PostsController::class)->name('post.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('add', 'add')->name('add');
    });

    Route::prefix('cate')->controller(CategoryController::class)->name('cate.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('add', 'add')->name('add');
    });

    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('add', 'add')->name('add');
    });
});
