@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">{{ __('login.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <a href="{{ route('signin') }}" class="button button-transparent">{{ __('login.common') }}</a>
                <a href="{{ route('login.facebook') }}" class="button button-fill">{{ __('login.facebook') }}</a>
                <a href="{{ route('login.google') }}" class="button button-fill">{{ __('login.google') }}</a>
            </div>
        </div>
        @include('includes.settings')
    </div>
@endsection
