<?php

use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Nutro\NutroMainController;
use \App\Http\Controllers\Nutro\Admin\NutroAdminController;
use Illuminate\Support\Str;
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

    Route::group(['middleware' => 'admin'], function(){
        Route::get('admin/', [NutroAdminController::class, 'index'])->name('admin_dashboard');
        Route::get('admin/music/add/', [NutroAdminController::class, 'musicAdd'])->name('admin.music.add');
        Route::post('admin/music/store', [NutroAdminController::class, 'musicStore'])->name('admin.music.store');
    });
});

Route::get('/email/verify', function (){
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
