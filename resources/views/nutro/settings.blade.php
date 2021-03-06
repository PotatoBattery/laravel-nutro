@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        <div class="arrow icon">
            <a href="{{ route('mainpage') }}" title="{{ __('settings.return') }}">
                <svg viewBox="190 150 100.28 70.28">
                    <path class="{{ $classes['icons'] }}" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
                </svg>
            </a>
        </div>
        <div class="title-container">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-m">{{ __('settings.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <nutro-color-control label="{{ __('settings.theme') }}" theme="{{ $theme }}" selected-class="{{ $classes['menu-items_link'] }}"></nutro-color-control>
                <div class="setting-menu-item {{ $classes['menu-items'] }}">
                    <label for="language">{{ __('settings.lang') }}</label>
                    @if($locale == "en")
                        <a hreflang="ru" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL("ru", null, [], true) }}" class="language-link {{ $classes['menu-items_link'] }}">English</a>
                    @else
                        <a hreflang="en" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL("en", null, [], true) }}" class="language-link {{ $classes['menu-items_link'] }}">Русский</a>
                    @endif
                </div>
                <div class="setting-menu-item {{ $classes['menu-items'] }}">
                    <a href="{{ route('about') }}" class="{{ $classes['menu-items_link'] }}">{{ __('settings.information') }}</a>
                </div>
                @guest
                @else
                    <div class="setting-menu-item {{ $classes['menu-items'] }}">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="{{ $classes['menu-items_link'] }}">
                            {{ __('settings.logout') }}
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
@endsection
