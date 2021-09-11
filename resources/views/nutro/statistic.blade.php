@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-sm">{{ __('statistic.title') }}</h1>
            </div>
        </div>
        <div class="content content-with-common-statistic-result">
            <div class="block">
                <div class="statistic_data">
                    <div class="statistic_data-item">
                        <div class="statistic_data-value">{{ $time }}</div>
                        <div class="statistic_data-message">{{ __('statistic.minutes') }}</div>
                    </div>
                    <div class="statistic_data-item">
                        <div class="statistic_data-value">{{ $count }}</div>
                        <div class="statistic_data-message">{{ __('statistic.meditations') }}</div>
                    </div>
                    <div class="statistic_data-item">
                        <div class="statistic_data-value">{{ $days }}</div>
                        <div class="statistic_data-message">{{ __('statistic.days') }}</div>
                    </div>
                </div>
                <nutro-chart :uid="{{ $uid }}" translate="{{ __('statistic.statistic') }}"></nutro-chart>
                <button class="button button-transparent button-share button-statistic">{{ __('statistic.share') }}</button>
            </div>
        </div>
    </div>
@endsection
