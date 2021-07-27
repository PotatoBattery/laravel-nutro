@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">Профиль</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <div class="profile-list-item">
                    <label for="firstname">Имя: </label>
                    <a href="" class="firstname-link">
                        {{ $userName[0] }}
                    </a>
                    <input type="text" name="firstname" class="profile-input hidden">
                </div>
                <div class="profile-list-item ">
                    <label for="lastname">Фамилия: </label>
                    <a href="" class="lastname-link">
                        {{ $userName[1] }}
                    </a>
                    <input type="text" name="lastname" class="profile-input hidden">
                </div>
                <div class="profile-list-item">
                    <label for="firstname">Email: </label>
                    <a href="" class="email-link">
                        {{ Auth::user()->email }}
                    </a>
                    <input type="email" name="email" class="profile-input hidden">
                </div>
                @if(Auth::user()->provider_id == NULL)
                <div class="profile-list-item ">
                    <a href="{{ route('forgot_password') }}" class="profile-logout">Сменить пароль</a>
                </div>
                @endif
                <div class="profile-list-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" id="logout_link" class="profile-password">Выйти из аккаунта</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
