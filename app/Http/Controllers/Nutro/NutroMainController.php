<?php

namespace App\Http\Controllers\Nutro;

use App\Http\Controllers\Controller;
use App\Models\Nutro\DayInRow;
use App\Models\Nutro\NutroQuotes;
use App\Models\Nutro\Statistic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class NutroMainController extends Controller
{

    public function settings(): Response
    {
        $locale = App::getLocale();
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('nutro.settings', compact('locale', 'theme', 'classes'));
    }

    public function about(): Response
    {
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('nutro.about', compact('classes'));
    }

    public function signin(): Response
    {
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('auth.signin', compact('classes'));
    }

    public function signup(): Response
    {
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('auth.signup', compact('classes'));
    }

    public function forgotPassword(): Response
    {
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('auth.forgot_password', compact('classes'));
    }

    public function profile(): Response
    {
        $access = Auth::user()->provider_id == null;
        $uid = Auth::user()->id;
        $userNameData = Auth::user()->name;
        $isAdmin = Auth::user()->is_admin;
        if($userNameData != null){
            $userName = explode(' ', $userNameData);
        }else{
            $userName = ['', ''];
        }
        $email = Auth::user()->email;
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('nutro.profile', compact('userName', 'email', 'access', 'uid', 'classes', 'theme', 'isAdmin'));
    }

    public function statistic(): Response
    {
        $uid = Auth::user()->id;
        $daysData = DayInRow::where('user_id', '=', $uid)->first();
        $days = $daysData != null ? $daysData->count : 0;
        $count = Statistic::where('user_id', '=', $uid)->sum('count_of_meditation');
        $timeData =  Statistic::where('user_id', '=', $uid)->get('time_of_meditation');
        if($timeData->count() > 0)
        {
            $minutes = 0;
            $seconds = 0;
            foreach ($timeData as $item)
            {
                $tmp = explode('.', $item->time_of_meditation);
                $minutes += intval($tmp[0]);
                $seconds += intval($tmp[1]);
            }
            if($seconds == 60)
            {
                $minutes++;
            }elseif($seconds > 60) {
                $tmp_sec = $seconds%60;
                $tmp_min = $seconds/60;
                $minutes += $tmp_min;
                if($tmp_sec >= 30){
                    $minutes += 1;
                }
            }
            $time = $minutes;
        }else{
            $time = 0;
        }
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('nutro.statistic', compact('days', 'count', 'time', 'uid', 'classes', 'theme'));
    }

    public function result(Request $request)
    {
        if($request->session()->previousUrl() == url()->full())
        {
            return redirect('/');
        }
        $tmpTime = intval(explode('.', $request->get('time'))[0]);
        $text = NutroQuotes::where('locale', '=', App::getLocale())->orderByRaw("RAND()")->first(['quote']);
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        if(Auth::check())
        {
            $result = Statistic::timeControl($request->get('time'));
            $time = $result[0] != '' ? $result[0] : $tmpTime;
            $count = $result[1] != '' ? $result[1] : 1;
            return response()->view('nutro.result', compact('time', 'text', 'count', 'classes'));
        }else{
            $time = $tmpTime;
            return response()->view('nutro.result', compact('time', 'text', 'classes'));
        }
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
                'p-black' =>'p-black',
                'profile-input' => 'profile-input-wb',
                'statistic_data-item' => 'statistic_data-item-wb',
                'chart-background' => 'chart-background-wb'
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
                'p-black' => '',
                'profile-input' => 'profile-input',
                'statistic_data-item' => 'statistic_data-item',
                'chart-background' => 'chart-background'
            );
        }
    }
}
