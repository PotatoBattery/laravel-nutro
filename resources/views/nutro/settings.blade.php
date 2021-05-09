@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        <div class="arrow icon">
            <svg viewBox="190 150 100.28 70.28">
                <path class="st0" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
            </svg>
        </div>
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">Настройки</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <div class="setting-menu-item">
                    <label for="color">Тема</label>
                    <input type="checkbox" name="color" id="color">
                    <label for="color"></label>
                </div>
                <div class="setting-menu-item">
                    <label for="language">Язык</label>
                    <a href="javascript:showLanguageOptions();" id="language" class="language-link">Русский</a>
                    <div id="language-options" class="language-options">
                        <div class="language-option">
                            <input type="radio" name="lang" id="lang-ru" value="ru" onclick="checkType()" checked><label for="lang-ru">Русский</label>
                        </div>
                        <div class="language-option">
                            <input type="radio" name="lang" id="lang-en" value="en" onclick="checkType()"><label for="lang-en">English</label>
                        </div>
                    </div>
                </div>
                <div class="setting-menu-item">
                    <a href="#">После медитации</a>
                </div>
                <div class="setting-menu-item">
                    <a href="{{ route('about') }}">Информация о проекте</a>
                </div>
                @guest
                @else
                    <div class="setting-menu-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Выйти из аккаунта
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
