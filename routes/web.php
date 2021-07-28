<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Nutro\NutroMainController;

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

Route::get('/', function () {
    return view('nutro.index');
})->name('mainpage');
//Google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
//Facebook login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('')->group(function (){
    Route::get('/settings', [NutroMainController::class, 'settings'])->name('settings');
    Route::get('/about', [NutroMainController::class, 'about'])->name('about');
    Route::get('/signin', [NutroMainController::class, 'signin'])->name('signin');
    Route::get('/signup', [NutroMainController::class, 'signup'])->name('signup');
    Route::get('/forgot_password', [NutroMainController::class, 'forgotPassword'])->name('forgot_password');
    Route::get('/profile', [NutroMainController::class, 'profile'])->name('profile');
    Route::get('/statistic', [NutroMainController::class, 'statistic'])->name('statistic');
    Route::get('/result', [NutroMainController::class, 'result'])->name('result');
});
