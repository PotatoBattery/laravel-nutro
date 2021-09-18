@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        <div class="arrow icon">
            <a href="{{ route('signin') }}">
                <svg viewBox="190 150 100.28 70.28">
                    <path class="{{ $classes['icons'] }}" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
                </svg>
            </a>
        </div>
        <div class="title-container">
            <div class="page-title">
                <h1 class="page-title-m {{ $classes['text-white'] }}">{{ __('signup.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="{{ route('register') }}" method="post" class="signin-form">
                    @csrf
                    <input type="email" name="email" id="email" class="field {{ $classes['field'] }} @error('email') is-invalid @enderror" placeholder="{{ __('signup.email') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <input type="password" name="password" id="password" class="field {{ $classes['field'] }} @error('password') is-invalid @enderror" placeholder="{{ __('signup.password') }}" required autocomplete="new-password">
                    <input id="password-confirm" type="password" class="field {{ $classes['field'] }}" name="password_confirmation" placeholder="{{ __('signup.repeat_password') }}" required autocomplete="new-password">
                    <button class="button {{ $classes['button-fill'] }} button-s button-submit-signin" type="submit">{{ __('signup.sign_up') }}</button>
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
    </div>
@endsection
