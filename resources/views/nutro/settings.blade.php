@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @include('includes.back')
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
