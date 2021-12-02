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
                                минут медитации
                            @else
                                минуты медитации
                            @endif
                        </div>
                    </div>
                    @if(!auth()->guest())
                    <div class="result">
                        <div class="{{  $classes['result-count'] }}">
                            {{ $count }}
                        </div>
                        <div class="{{ $classes['result-title'] }}">
                            Медитаций подряд
                        </div>
                    </div>
                    @endif
                    <div class="{{ $classes['result-quote'] }}">
                        &laquo;{{ $text->quote }}&raquo;
                    </div>
                </div>
                <a class="button {{ $classes['button-fill'] }} button-statistic" href="{{ route('mainpage') }}">Начать заново</a>
                <button class="button {{ $classes['button-transparent'] }} button-share button-statistic">Поделиться</button>
                @if(!auth()->guest())
                    <a href="{{ route('statistic') }}" class="button {{ $classes['button-transparent'] }} button-statistic" id="common_statistic">Открыть статистику</a>
                @else
                    <a href="{{ route('signin') }}" class="signin-link-btn">Войдите, чтобы отслеживать прогресс</a>
                @endif
            </div>
        </div>
        @include('includes.settings')
    </div>
@endsection
