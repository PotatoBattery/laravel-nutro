<?php

namespace App\Http\Controllers\Nutro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutroMainController extends Controller
{

    public function settings()
    {
        return view('nutro.settings');
    }

    public function about()
    {
        return view('nutro.about');
    }

    public function signin()
    {
        return view('auth.signin');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function profile()
    {
        return view('nutro.profile');
    }

    public function statistic()
    {
        return view('nutro.statistic');
    }
}
