@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title">
                <h1 class="page-title-m text-white">Регистрация</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="{{ route('register') }}" method="post" class="signin-form">
                    @csrf
                    <input type="email" name="email" id="email" class="field @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <input type="password" name="password" id="password" class="field @error('password') is-invalid @enderror" placeholder="Пароль" required autocomplete="new-password">
                    <input id="password-confirm" type="password" class="field" name="password_confirmation" placeholder="Повторите пароль" required autocomplete="new-password">
                    <button class="button button-fill button-s button-submit-signin" type="submit">Зарегистрироваться</button>
                </form>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @include('includes.settings')
    </div>
@endsection
