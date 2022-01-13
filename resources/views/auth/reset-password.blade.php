@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">{{ __('passwords.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <input type="email" name="email" class="field  @error('email') is-invalid @enderror" placeholder="{{ __('passwords.email') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <input id="password" type="password" class="field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="{{ __('passwords.new-password') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <input id="password-confirm" type="password" class="field" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('passwords.confirm-password') }}">
                    </div>

                    <div class="form-group row mb-0">
                        <button type="submit" class="button button-fill button-m button-submit-signup">
                            {{ __('passwords.confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
