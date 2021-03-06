@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        <div class="arrow icon">
            <a href="{{ route('mainpage') }}">
                <svg viewBox="190 150 100.28 70.28">
                    <path class="{{ $classes['icons'] }}" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
                </svg>
            </a>
        </div>
        <div class="title-container">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-m">{{ __('login.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <a href="{{ route('signin') }}" class="button {{ $classes['button-transparent'] }}">{{ __('login.common') }}</a>
                <a href="{{ route('login.facebook') }}" class="button {{ $classes['button-fill'] }}">{{ __('login.facebook') }}</a>
                <a href="{{ route('login.google') }}" class="button {{ $classes['button-fill'] }}">{{ __('login.google') }}</a>
            </div>
        </div>
    </div>
@endsection
