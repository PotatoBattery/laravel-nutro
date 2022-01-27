@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        @include('includes.back')
        <div class="title-container">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-m">О приложении</h1>
            </div>
        </div>
        <div class="content">
            <div class="block block-about">
                <p class="{{ $classes['p-black'] }}">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim sem ex. Cras efficitur neque dapibus nulla malesuada, non tincidunt ex placerat. Pellentesque eleifend venenatis lorem, sed ultricies mi sodales eu. Vestibulum sit amet accumsan neque, vel semper nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas in erat nec sagittis. Etiam eleifend vehicula quam, et fermentum nisl scelerisque vitae. Quisque finibus nibh lacus. Vivamus sed ornare velit. Donec at tempus ex, at gravida quam. Mauris at rhoncus elit, id porttitor ligula. Suspendisse vitae massa et felis finibus condimentum. Nullam bibendum dolor erat, non cursus metus pellentesque non. Praesent porta nunc vel pellentesque vehicula.
                </p>
            </div>
        </div>
{{--        @include('includes.settings')--}}
    </div>
@endsection
