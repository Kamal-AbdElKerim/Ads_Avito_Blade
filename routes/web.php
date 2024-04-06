<?php

use App\Http\Controllers\AddAds;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategorieController;
use App\Http\Controllers\Dashboard\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'admin'], function () {
    Route::get('/Dashboard/Home', [dashboardController::class, 'dashboard'])->name('Dashboard.Home');
    Route::get('/Dashboard/Categorie', CategorieController::class)->name('Dashboard.Categorie');
    Route::get('/Dashboard/Users', [UserController::class, 'Users'])->name('Dashboard.Users');
    Route::get('/Dashboard/block_user/{id}', [UserController::class, 'block_user'])->name('block_user');
    Route::get('/Dashboard/Ads', [AdsController::class, 'Ads'])->name('Dashboard.Ads');
    Route::get('/Dashboard/approve/{id}', [AdsController::class, 'approve'])->name('approve');
    Route::get('/Dashboard/reject/{id}', [AdsController::class, 'reject'])->name('reject');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/ProfileSettings', [LoginController::class, 'ProfileSettings'])->name('ProfileSettings');
    Route::post('/update-profile', [LoginController::class, 'update_profile'])->name('update-profile');
    Route::post('/change-password', [LoginController::class, 'changePassword'])->name('change-password');
    Route::get('/post/ads', AddAds::class)->name('post.ads');
    Route::get('/MyAds', AddAds::class)->name('MyAds');
    Route::get('/favorite/{id}', [favoriteController::class, 'favorite'])->name('favorite');
    Route::get('/remove_favorite/{id}', [favoriteController::class, 'remove_favorite'])->name('remove_favorite');
    Route::get('/list_favorite', [favoriteController::class, 'list_favorite'])->name('list_favorite');
    Route::get('/Dashboard_user', [NotificationController::class, 'Dashboard_user'])->name('Dashboard_user');
    Route::get('/remove_notification/{id}', [NotificationController::class, 'remove_notification'])->name('remove_notification');

});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login/form', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login_post');
    Route::get('/Register/form', [RegisterController::class, 'index'])->name('Register');
    Route::post('/Register', [RegisterController::class, 'store'])->name('register_post');
});


Route::get('/home', [HomeController::class, 'index'])->name('Home');
Route::get('/Category', CategoryController::class)->name('Category');
Route::get('/SinglPage/{id}', [HomeController::class, 'SinglPage'])->name('SinglPage');
