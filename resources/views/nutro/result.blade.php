@extends('layouts.nutro')
@php
    /** @var  $time */
     /** @var  $count */
     /** @var  $text */
@endphp
@section('content')
    <div class="wrap wrap-color">
        @guest
            @include('includes.statistic_not_auth')
        @else
            @include('includes.profile')
            @include('includes.statistic_auth')
        @endguest
        <div class="content content-with-statistic-result">
            <div class="block">
                <div class="statistic-result">
                    <div class="result">
                        <div class="result-count">
                            {{$time}}
                        </div>
                        <div class="result-title">
                            @if($time < 10)
                                минут медитации
                            @else
                                минуты медитации
                            @endif
                        </div>
                    </div>
                    @if(!auth()->guest())
                    <div class="result">
                        <div class="result-count">
                            {{ $count }}
                        </div>
                        <div class="result-title">
                            Медитаций подряд
                        </div>
                    </div>
                    @endif
                    <div class="result-quote">
                        &laquo;{{ $text->quote }}&raquo;
                    </div>
                </div>
                <a class="button button-fill button-statistic" href="{{ route('mainpage') }}">Начать заново</a>
                <button class="button button-transparent button-share button-statistic">Поделиться</button>
                @if(!auth()->guest())
                <button class="button button-transparent button-statistic" id="common_statistic">Открыть статистику</button>
                @else
                <a href="{{ route('signin') }}" class="signin-link-btn">Войдите, чтобы отслеживать прогресс</a>
                @endif
            </div>
        </div>
        @include('includes.settings')
    </div>
@endsection
