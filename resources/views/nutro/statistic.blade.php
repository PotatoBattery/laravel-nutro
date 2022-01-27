@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        <div class="arrow icon">
            <a href="{{ route('profile') }}">
                <svg viewBox="190 150 100.28 70.28">
                    <path class="{{ $classes['icons'] }}" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
                </svg>
            </a>
        </div>
        <div class="title-container title-container-statistic">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-sm">{{ __('statistic.title') }}</h1>
            </div>
        </div>
        <div class="content content-with-common-statistic-result">
            <div class="block">
                <div class="statistic_data">
                    <div class="{{ $classes['statistic_data-item'] }}">
                        <div class="statistic_data-value">{{ $time }}</div>
                        <div class="statistic_data-message">{{ __('statistic.minutes') }}</div>
                    </div>
                    <div class="{{ $classes['statistic_data-item'] }}">
                        <div class="statistic_data-value">{{ $count }}</div>
                        <div class="statistic_data-message">{{ __('statistic.meditations') }}</div>
                    </div>
                    <div class="{{ $classes['statistic_data-item'] }}">
                        <div class="statistic_data-value">{{ $days }}</div>
                        <div class="statistic_data-message">{{ __('statistic.days') }}</div>
                    </div>
                </div>
                <nutro-chart :uid="{{ $uid }}" translate="{{ __('statistic.statistic') }}" :theme="{{ $theme == 'colored' ? 'true' : 'false' }}"></nutro-chart>
{{--                <button class="button {{ $classes['button-transparent'] }} button-share button-statistic">{{ __('statistic.share') }}</button>--}}
            </div>
        </div>
    </div>
@endsection
