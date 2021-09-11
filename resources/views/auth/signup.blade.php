@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        @include('includes.back')
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
