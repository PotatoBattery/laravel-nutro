@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-m">{{ __('passwords.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <input type="email" name="email" class="field {{ $classes['field'] }}" placeholder="{{ __('passwords.email') }}" value="{{ old('email') }}">
                    <button type="submit" class="button {{ $classes['button-fill'] }} button-m button-submit-signup">{{ __('passwords.confirm') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
