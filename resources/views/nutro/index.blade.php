@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @guest
            @include('includes.statistic_not_auth')
        @else
            @include('includes.profile')
            @include('includes.statistic_auth')
        @endguest
        <nutro-index />
        @include('includes.settings')
    </div>
@endsection
