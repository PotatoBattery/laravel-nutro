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
                @if($access)
                    <nutro-profile-item label="Имя" field="{{ $userName[0] }}" field-name="firstname" :uid="{{ $uid }}"> </nutro-profile-item>
                    <nutro-profile-item label="Фамилия" field="{{ $userName[1] }}" field-name="secondname" :uid="{{ $uid }}"> </nutro-profile-item>
                    <nutro-profile-item label="Email" field="{{ $email }}" field-name="email" :uid="{{ $uid }}"> </nutro-profile-item>
                    <div class="profile-list-item ">
                        <a href="{{ route('forgot_password') }}" class="profile-logout">Сменить пароль</a>
                    </div>
                @else
                    <div class="profile-list-item">
                        <label for="firstname">Имя: </label>
                        <a href="" class="firstname-link">
                            {{ $userName[0] }}
                        </a>
                    </div>
                    <div class="profile-list-item ">
                        <label for="lastname">Фамилия: </label>
                        <a href="" class="lastname-link">
                            {{ $userName[1] }}
                        </a>
                    </div>
                    <div class="profile-list-item">
                        <label for="firstname">Email: </label>
                        <a href="" class="email-link">
                            {{ $email }}
                        </a>
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
