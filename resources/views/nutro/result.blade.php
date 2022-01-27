@extends('layouts.nutro')
@php
      /** @var  $time */
     /** @var  $count */
     /** @var  $text */
@endphp
@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        @guest
            @include('includes.statistic_not_auth')
        @else
            @include('includes.profile')
            @include('includes.statistic_auth')
        @endguest
        <div class="content content-with-statistic-result">
            <div class="block">
                <div class="{{  $classes['statistic-result'] }}">
                    <div class="result">
                        <div class="{{  $classes['result-count'] }}">
                            {{$time}}
                        </div>
                        <div class="{{ $classes['result-title'] }}">
                            @if($time < 10)
                                {{ __('statistic.minute') }}
                            @else
                                {{ __('statistic.minutes_row') }}
                            @endif
                        </div>
                    </div>
                    @if(!auth()->guest())
                    <div class="result">
                        <div class="{{  $classes['result-count'] }}">
                            {{ $count }}
                        </div>
                        <div class="{{ $classes['result-title'] }}">
                            {{ __('statistic.meditation_in_row') }}
                        </div>
                    </div>
                    @endif
                    <div class="{{ $classes['result-quote'] }}">
                        &laquo;{{ $text->quote }}&raquo;
                    </div>
                </div>
                <a class="button {{ $classes['button-fill'] }} button-statistic" href="{{ route('mainpage') }}">{{ __('statistic.restart') }}</a>
{{--                <button class="button {{ $classes['button-transparent'] }} button-share button-statistic">{{ __('statistic.share') }}</button>--}}
                @if(!auth()->guest())
                    <a href="{{ route('statistic') }}" class="button {{ $classes['button-transparent'] }} button-statistic" id="common_statistic">{{ __('statistic.statistic_but') }}</a>
                @else
                    <a href="{{ route('signin') }}" class="signin-link-btn">{{ __('statistic.login') }}</a>
                @endif
            </div>
        </div>
        @include('includes.settings')
    </div>
@endsection
