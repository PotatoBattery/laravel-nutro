@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title">
                <h1 class="page-title-m text-white">{{ __('signin.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="{{ route('login') }}" method="post" class="signin-form">
                    @csrf
                    <input type="email" name="email" id="email" class="field @error('email') is-invalid @enderror" placeholder="{{ __('signin.email') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <input type="password" name="password" id="password" class="field @error('password') is-invalid @enderror" placeholder="{{ __('signin.password') }}" required autocomplete="current-password">
                    <button class="button button-fill button-s button-submit-signin" type="submit">{{ __('signin.button') }}</button>
                </form>
                <a href="{{ route('signup') }}" class="signin-link-btn">{{ __('signin.signup') }}</a>
                <a href="{{ route('forgot_password') }}" class="forgot_password_link">{{ __('signin.forgot_password') }}</a>
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
