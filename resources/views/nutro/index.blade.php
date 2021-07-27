@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        @guest
            <div class="statistic icon">
                <a href="{{ route('login') }}">
                    <svg viewBox="150 290 75.28 75.28">
                        <path class="st0" d="M172.21 356.79v-18.3-2.59c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v20.89c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5zM194.78 356.79v-36.63-5.14c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v41.77c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5zM217.35 356.79v-19.65-31.17-7.18c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v58c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5z"/>
                    </svg>
                </a>
            </div>
        @else
            <div class="profile icon">
                <a href="{{ route('profile') }}">
                    <svg viewBox="200 340 120 120">
                        <path class="st0" d="M299.88 425.16c-5.95-8.34-14.06-14.63-23.63-18.28 4.64-4.61 7.5-11.02 7.56-17.73 0-.16-.01-.33-.02-.49-.29-10.35-6.88-19.3-16.57-22.88-9.41-3.47-20.79-.32-27.11 7.44-6.61 8.11-7.8 19.67-2.29 28.72 1.1 1.82 2.42 3.44 3.9 4.86-8.17 2.95-15.6 7.95-21.23 14.75-7.55 9.12-11.78 20.44-11.82 32.31-.01 2.62 2.31 5.12 5 5 2.72-.12 4.99-2.2 5-5 0-1.17.04-2.33.13-3.49.04-.57.1-1.15.16-1.72.03-.23.06-.46.08-.68-.13 1.41-.03.31.02-.03.37-2.28.91-4.53 1.63-6.73.32-.99.69-1.97 1.07-2.94l.3-.66c.25-.55.52-1.1.79-1.64 1.02-2 2.19-3.93 3.49-5.76l.38-.53c.06-.09.65-.98.2-.28-.44.7.14-.17.22-.27.14-.17.27-.34.41-.51.76-.92 1.57-1.82 2.4-2.68.68-.7 1.39-1.38 2.12-2.04.4-.37.82-.72 1.23-1.07.21-.18.42-.35.63-.52.13-.1.25-.21.38-.31.42-.33.34-.27-.24.18.14-.31.91-.67 1.19-.87.45-.32.9-.62 1.36-.92.96-.63 1.95-1.22 2.96-1.78.92-.5 1.85-.98 2.8-1.42.25-.12.5-.23.75-.34.83-.38-.23.06-.28.11.35-.34 1.39-.55 1.86-.72 2.11-.76 4.27-1.37 6.47-1.81.56-.11 1.12-.21 1.68-.3l.62-.09c.03 0 .06 0 .09-.01 1.15-.11 2.3-.22 3.46-.26h.15c1.24.1 2.49.11 3.75.03 1.02.05 2.04.12 3.06.24.16.02 1.15.29.36.04-.8-.25.21.04.35.06.56.09 1.12.19 1.68.3 1.1.22 2.2.48 3.28.79 1.07.3 2.14.64 3.19 1.02.52.19 1.04.4 1.55.6.11.04.18.06.23.07.15.08.29.17.4.22 2 .92 3.93 1.98 5.77 3.17.46.3.91.6 1.36.92.27.19 1.18.64 1.32.97a16.22 16.22 0 00-.1-.08c.21.17.42.34.63.52.46.38.92.77 1.36 1.17 1.62 1.46 3.14 3.03 4.54 4.7.17.21.35.42.52.63.1.13.2.26.31.38.23.29.14.17-.28-.36.38.18.92 1.25 1.15 1.59.68.99 1.33 2.01 1.93 3.05.61 1.05 1.17 2.12 1.69 3.21l.42.9c.04.1.09.2.13.3.22.5.18.4-.11-.28.34.35.5 1.26.67 1.7.87 2.37 1.54 4.81 2 7.3.11.59.39 1.43.33 2.02.01-.1-.14-1.23-.05-.31.03.34.08.69.11 1.03.13 1.39.19 2.79.19 4.18.01 2.62 2.29 5.12 5 5 2.7-.12 5.01-2.2 5-5-.04-10.17-3.12-20.39-9.04-28.69zm-35.44-22.21c.15-.06.28-.11.37-.16-.16.09-.34.18-.37.16zm8.15-7.82c.03-.01.11-.16.17-.3-.06.17-.12.29-.17.3zm1.15-7.76c-.01-.1-.02-.17-.03-.25.03.13.04.25.03.25zm-5.34-9.7c-.14-.11-.25-.2-.33-.26.14.09.32.21.33.26zm-3.6-2.19c-.17-.06-.36-.14-.36-.14.03-.01.19.06.36.14zm-3.81-1.04c-.09-.01-.17-.01-.17 0 .01-.02.08-.01.17 0zm-13.44 5.35s-.07.08-.15.18c.06-.1.12-.18.15-.18zm-3.22 7.58c-.13-.1.28-1.43.34-1.66.08-.33.5-2.47.82-2.54 0 0-.54 1.15-.11.28.1-.2.19-.4.29-.6.24-.49.51-.97.8-1.44.23-.37.47-.74.72-1.1.02-.03.07-.1.12-.18.03-.03.05-.06.09-.1.62-.69 1.23-1.37 1.92-2 .2-.18.41-.35.62-.54.16-.14.19-.19.18-.2.25-.16.53-.31.65-.38.78-.51 1.6-.95 2.44-1.36.2-.1.85-.25.16-.08-.8.2.21-.07.33-.11a18.78 18.78 0 012.58-.73c.22-.05.44-.08.67-.13h.01c.93-.08 1.86-.14 2.8-.11.46.02.92.06 1.38.1.07.01.1.01.15.01.18.04.35.09.38.1 1.05.21 2.05.54 3.06.88.1.03.16.05.21.07.19.1.37.2.41.22a20.141 20.141 0 012.54 1.51c.01 0 .05.03.12.07.02.01.02.02.04.03.13.1.25.21.38.31.79.68 1.49 1.42 2.18 2.2.05.06.15.15.23.22-.03-.03-.06-.05-.11-.09-.56-.48.07.1.2.28.31.45.61.91.89 1.38.28.47.54.96.77 1.45.02.04.08.15.13.26.02.06.04.13.07.23.35 1.01.66 2.02.86 3.07 0-.02.03.14.07.31.01.13.03.26.04.39.05.58.07 1.16.08 1.74 0 .47-.02.93-.05 1.4l-.06.69c-.08 1 .04-.31.04-.31.24.18-.6 2.64-.7 2.95-.03.1-.11.43-.21.73-.01.01-.05.08-.13.24-.1.2-.19.4-.29.6-.44.88-.95 1.73-1.51 2.54-.01.01-.06.09-.12.19l-.09.09c-.29.32-.57.66-.87.98-.3.32-.61.62-.93.92-.2.18-.41.36-.61.54-.6.54-.14.28.05.05-.31.45-1.77 1.12-2.12 1.32-.38.22-.77.42-1.17.61l-.14.07c-.01.01-.02.01-.03.01-.15.06-.31.12-.47.18-.84.3-1.71.55-2.58.73l-.61.12h-.02c-1.41-.06-2.82-.06-4.23 0-.13-.02-.26-.03-.36-.05-.55-.11-1.1-.24-1.64-.39-.43-.12-.85-.26-1.27-.41.01 0-.13-.04-.28-.09-.02-.01-.03-.02-.06-.03-.89-.44-1.76-.89-2.59-1.43-.18-.12-1.02-.54-1.07-.75 0 .01.95.8.24.17-.16-.14-.33-.28-.49-.43-.74-.66-1.38-1.38-2.04-2.11-.04-.04-.06-.07-.09-.09-.06-.1-.12-.18-.12-.19-.25-.36-.49-.72-.72-1.1-.23-.37-.44-.76-.65-1.15-.1-.19-.2-.39-.29-.59l-.21-.45c-.15-.34-.09-.2.18.43-.34-.11-.73-2.18-.82-2.54-.11-.43-.18-.86-.27-1.3-.02-.25-.06-.51-.08-.75-.07-.93-.06-1.86 0-2.79l.06-.69c.02-.78-.14.29-.09.32zm12.48 16.43h-.03c-.29-.02-.17-.02.03 0z"/>
                    </svg>
                </a>
            </div>
            <div class="statistic icon">
                <a href="{{ route('statistic') }}">
                    <svg viewBox="150 290 75.28 75.28">
                        <path class="st0" d="M172.21 356.79v-18.3-2.59c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v20.89c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5zM194.78 356.79v-36.63-5.14c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v41.77c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5zM217.35 356.79v-19.65-31.17-7.18c0-2.62-2.3-5.12-5-5-2.71.12-5 2.2-5 5v58c0 2.62 2.3 5.12 5 5 2.71-.12 5-2.2 5-5z"/>
                    </svg>
                </a>
            </div>
        @endguest
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-l timer">10:00</h1>
            </div>
        </div>
        <div class="content content-with-timer">
            <div class="block">
                <a href="#" class="music-link">звуки леса</a>
                <button class="button button-fill button-s button-start">Начать</button>
            </div>
        </div>
        @include('includes.settings')
    </div>
@endsection