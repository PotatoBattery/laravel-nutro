<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Nutro\NutroMainController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

//Google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
//Facebook login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [HomeController::class, 'index'])->name('mainpage');
    Route::get('/result', [NutroMainController::class, 'result'])->name('result');
    Route::get('/settings', [NutroMainController::class, 'settings'])->name('settings');
    Route::get('/about', [NutroMainController::class, 'about'])->name('about');
    Route::get('/signin', [NutroMainController::class, 'signin'])->name('signin');
    Route::get('/signup', [NutroMainController::class, 'signup'])->name('signup');
    Route::get('/forgot_password', [NutroMainController::class, 'forgotPassword'])->name('forgot_password');
    Auth::routes();
    Route::get('/profile', [NutroMainController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
    Route::get('/statistic', [NutroMainController::class, 'statistic'])->middleware(['auth', 'verified'])->name('statistic');
});

Route::get('/email/verify', function (){
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
