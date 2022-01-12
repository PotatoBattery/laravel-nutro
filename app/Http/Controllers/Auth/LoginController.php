<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('mainpage');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('mainpage');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->email_verified_at =  date('Y-m-d H:i:s');
            $user->save();
        }

        Auth::login($user);
    }

    public function showLoginForm()
    {
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('auth.login', compact('classes'));
    }

    public function getTheme($theme)
    {
        if($theme == 'wb'){
            return array(
                'wrap' => '',
                'text-white' => '',
                'icons' => 'st1',
                'menu-items' => 'setting-menu-item-wb',
                'menu-items_link' => 'wb',
                'language-options' => 'language-options_wb',
                'language-options_label' => 'label_wb',
                'button-fill' => 'button-fill_wb',
                'button-transparent' => 'button-transparent_wb',
                'field' => 'field_wb',
                'signup-link' => 'signup-link_wb',
                'music-link' => 'music-link_wb',
                'errors' => 'errors_wb',
                'profile-list-item' => 'profile-list-item-wb',
                'forgot_password_link' => 'forgot_password_link-wb',
                'signin-link-btn' => 'signin-link-btn-wb',
                'statistic-result' => 'statistic-result-wb',
                'result-quote' => 'result-quote-wb',
                'result-count' => 'result-count-wb',
                'result-title' => 'result-title-wb',
                'timer-values' => 'timer-values-wb',
                'timer-value' => 'timer-value-wb',
                'p-black' =>'p-black'
            );
        }else{
            return array(
                'wrap' => 'wrap-color',
                'text-white' => 'text-white',
                'icons' => 'st0',
                'menu-items' => '',
                'menu-items_link' => '',
                'language-options' => '',
                'language-options_label' => '',
                'button-fill' => 'button-fill',
                'button-transparent' => 'button-transparent',
                'field' => '',
                'signup-link' => 'signup-link',
                'music-link' => 'music-link',
                'errors' => 'errors',
                'profile-list-item' => '',
                'forgot_password_link' => '',
                'signin-link-btn' => 'signin-link-btn',
                'statistic-result' => 'statistic-result',
                'result-quote' => 'result-quote',
                'result-count' => 'result-count',
                'result-title' => 'result-title',
                'timer-values' => 'timer-values',
                'timer-value' => 'timer-value',
                'p-black' => ''
            );
        }
    }
}
