<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\StatisticController;
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

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home');

    Route::get('/information', 'indexInfo');
    Route::get('/information/news/{news}', 'showNews');

    Route::get('/profile/about', 'about');
    Route::get('/profile/statistic', 'statistic');

    Route::get('/government/staf', 'indexStaf');
    Route::get('/government/staf/{staf}', 'stafDetail');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::resource('/dashboard', DashboardController::class)->only(['index', 'update'])->middleware('auth');
    Route::resource('/news', NewsController::class)->except(['show'])->middleware('auth');
    Route::resource('/event', EventController::class)->except(['show'])->middleware('auth');
    Route::resource('/staf', StafController::class)->except(['show'])->middleware('auth');
    Route::resource('/about', AboutController::class)->only(['index', 'update'])->middleware('auth');
    Route::resource('/statistic', StatisticController::class)->only(['index', 'update'])->middleware('auth');

    Route::put('/social', [SocialController::class, 'update'])->middleware('auth');

    Route::resource('/user', UserProfileController::class)->only(['index', 'update'])->middleware('auth');

    Route::middleware(['auth', 'superadmin'])->group(function () {
        Route::resource('/admin', AdminController::class)->except(['show']);
        Route::put('/admin/{admin}/change', [AdminController::class, 'changeAdmin']);
    });
});
