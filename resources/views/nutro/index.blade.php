@extends('layouts.nutro')

@section('content')
    <div class="wrap {{$classes['wrap']}}">
        @guest
            @include('includes.statistic_not_auth')
        @else
            @include('includes.profile')
            @include('includes.statistic_auth')
        @endguest
        @include('includes.settings')
        <nutro-index :classes="{{ json_encode($classes) }}" ></nutro-index>
    </div>
@endsection
