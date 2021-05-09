@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        <div class="arrow icon">
            <svg viewBox="190 150 100.28 70.28">
                <path class="st0" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
            </svg>
        </div>
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">О приложении</h1>
            </div>
        </div>
        <div class="content">
            <div class="block block-about">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim sem ex. Cras efficitur neque dapibus nulla malesuada, non tincidunt ex placerat. Pellentesque eleifend venenatis lorem, sed ultricies mi sodales eu. Vestibulum sit amet accumsan neque, vel semper nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas in erat nec sagittis. Etiam eleifend vehicula quam, et fermentum nisl scelerisque vitae. Quisque finibus nibh lacus. Vivamus sed ornare velit. Donec at tempus ex, at gravida quam. Mauris at rhoncus elit, id porttitor ligula. Suspendisse vitae massa et felis finibus condimentum. Nullam bibendum dolor erat, non cursus metus pellentesque non. Praesent porta nunc vel pellentesque vehicula.
                </p>
                <p>
                    Vestibulum commodo nisi elit, ac hendrerit lorem mattis non. Vivamus volutpat dolor justo. Cras augue nulla, auctor ac dapibus vitae, tincidunt non ipsum. Vivamus facilisis augue maximus dui bibendum, feugiat interdum dolor fringilla. Nunc consequat lacus a mauris cursus, a hendrerit turpis finibus. Maecenas porta luctus lacinia. Maecenas ultricies dapibus sem, commodo tempor lacus euismod varius. Duis et feugiat enim. In sit amet dolor consequat, ultrices justo non, pulvinar ligula.
                </p>
            </div>
        </div>
        <div class="settings icon">
            <a href="{{ route('settings') }}">
                <svg viewBox="190 408 70.28 70.28" >
                    <path class="st0" d="M258.57 448.11c-2.23-1.29-4.46-2.58-6.69-3.86.04-.56.07-1.12.07-1.68-.01-.9-.07-1.79-.17-2.68 2.26-1.31 4.53-2.61 6.79-3.92 1.17-.68 1.57-2.25.9-3.42-2.82-4.88-5.64-9.77-8.46-14.65-.68-1.17-2.25-1.57-3.42-.9-2.38 1.37-4.76 2.75-7.14 4.12-1.08-.72-2.19-1.34-3.36-1.89v-8.31c0-1.35-1.15-2.5-2.5-2.5h-16.92c-1.35 0-2.5 1.15-2.5 2.5v8.31a27.02 27.02 0 00-3.36 1.89c-2.38-1.37-4.76-2.75-7.14-4.12-1.16-.67-2.74-.28-3.42.9-2.82 4.88-5.64 9.77-8.46 14.65-.67 1.16-.28 2.74.9 3.42 2.26 1.31 4.53 2.62 6.79 3.92-.15 1.45-.17 2.9-.08 4.35-2.24 1.29-4.47 2.58-6.71 3.88-1.17.68-1.57 2.25-.9 3.42 2.82 4.88 5.64 9.77 8.46 14.65.68 1.17 2.25 1.57 3.42.9 2.11-1.22 4.21-2.43 6.32-3.65 1.33.95 2.71 1.76 4.18 2.47v7.26c0 1.35 1.15 2.5 2.5 2.5h16.92c1.35 0 2.5-1.15 2.5-2.5v-7.26c1.47-.7 2.85-1.52 4.18-2.47 2.11 1.22 4.21 2.43 6.32 3.65 1.16.67 2.74.28 3.42-.9 2.82-4.88 5.64-9.77 8.46-14.65.67-1.18.28-2.75-.9-3.43zm-10.64 13.39c-1.86-1.07-3.72-2.15-5.57-3.22-1.04-.6-2.16-.33-3.03.39a20.686 20.686 0 01-5.41 3.21c-1.04.42-1.84 1.22-1.84 2.41v6.36h-11.92v-6.36c0-1.2-.8-2-1.84-2.41a20.85 20.85 0 01-5.41-3.21c-.87-.72-2-.99-3.03-.39-1.86 1.07-3.72 2.15-5.57 3.22-1.99-3.44-3.97-6.88-5.96-10.32 1.97-1.14 3.94-2.27 5.91-3.41.69-.4 1.34-1.32 1.24-2.16-.26-2.13-.29-4.28.06-6.41.18-1.11-.12-2.23-1.15-2.82-2.02-1.17-4.04-2.33-6.06-3.5 1.99-3.44 3.97-6.88 5.96-10.32 2.11 1.22 4.23 2.44 6.34 3.66.71.41 1.83.52 2.52 0 1.58-1.2 3.3-2.25 5.15-2.99 1.04-.42 1.84-1.22 1.84-2.41v-7.41h11.92v7.41c0 1.2.8 1.99 1.84 2.41 1.85.74 3.56 1.79 5.15 2.99.69.52 1.82.41 2.52 0 2.11-1.22 4.23-2.44 6.34-3.66 1.99 3.44 3.97 6.88 5.96 10.32-2.02 1.17-4.04 2.33-6.06 3.5-1.04.6-1.33 1.72-1.15 2.82.18 1.11.25 2.23.26 3.36-.01 1.02-.08 2.03-.21 3.05-.1.84.55 1.76 1.24 2.16 1.97 1.14 3.94 2.27 5.91 3.41-1.97 3.44-3.96 6.88-5.95 10.32z"/>
                    <path class="st0" d="M235.2 431.78c-4.6-3.75-11.13-4.43-16.28-1.35-5.13 3.07-7.67 9.03-6.62 14.86 1.19 6.59 7.26 11.28 13.83 11.37 5.93-.08 11.14-3.74 13.25-9.28 2.04-5.4.31-11.95-4.18-15.6zm-.09 12.34c-.82 4.4-4.58 7.49-8.98 7.55-3.73-.05-7.27-2.36-8.53-5.9-1.33-3.74-.24-7.85 2.87-10.36 2.88-2.32 7.13-2.58 10.34-.66 3.18 1.9 4.97 5.74 4.3 9.37z"/>
                </svg>
            </a>
        </div>
    </div>
@endsection
