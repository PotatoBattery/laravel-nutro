<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cookie::get('color') == null)
        {
            Cookie::queue('color', 'colored', 43200);
        }
        $theme = Cookie::get('color');
        $classes = $this->getTheme($theme);
        return response()->view('nutro.index', compact('classes'));
    }

    public function getTheme($theme)
    {
        if($theme == 'wb'){
            return array(
                'wrap' => '',
                'text_white' => '',
                'icons' => 'st1',
                'menu-items' => 'setting-menu-item-wb',
                'menu-items_link' => 'wb',
                'language-options' => 'language-options_wb',
                'language-options_label' => 'label_wb',
                'button_fill' => 'button-fill_wb',
                'button_transparent' => 'button-transparent_wb',
                'field' => 'field_wb',
                'signup-link' => 'signup-link_wb',
                'music_link' => 'music-link_wb',
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
                'timer_values' => 'timer-values-wb',
                'timer_value' => 'timer-value-wb'
            );
        }else{
            return array(
                'wrap' => 'wrap-color',
                'text_white' => 'text-white',
                'icons' => 'st0',
                'menu-items' => '',
                'menu-items_link' => '',
                'language-options' => '',
                'language-options_label' => '',
                'button-fill' => 'button-fill',
                'button-transparent' => 'button-transparent',
                'field' => '',
                'signup-link' => 'signup-link',
                'music_link' => 'music-link',
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
                'timer_values' => 'timer-values',
                'timer_value' => 'timer-value'
            );
        }
    }
}
