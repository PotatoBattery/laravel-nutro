@extends('layouts.nutro')

@section('content')
    <div class="wrap {{ $classes['wrap'] }}">
        <div class="arrow icon">
            <a href="{{ route('mainpage') }}">
                <svg viewBox="190 150 100.28 70.28">
                    <path class="{{ $classes['icons'] }}" d="M284.14 179.81h-77.39l11.45-11.45 2.84-2.84c1.85-1.85 1.99-5.24 0-7.07-2-1.83-5.09-1.98-7.07 0l-19.99 19.99-2.84 2.84c-.07.07-.12.16-.19.24-.82.89-1.33 2.05-1.27 3.3.01.14.04.27.06.41.07 1.17.52 2.3 1.41 3.12l19.99 19.99 2.84 2.84c1.85 1.85 5.24 1.99 7.07 0 1.83-2 1.98-5.09 0-7.07l-14.3-14.3h66.34c3.63 0 7.28.1 10.91 0h.15c2.62 0 5.12-2.3 5-5-.13-2.71-2.2-5-5.01-5z" />
                </svg>
            </a>
        </div>
        <div class="title-container">
            <div class="page-title {{ $classes['text-white'] }}">
                <h1 class="page-title-m">{{ __('profile.title') }}</h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                @if($access)
                    <nutro-profile-item label="{{ __('profile.name') }}" field="{{ $userName[0] }}" field-name="firstname" :uid="{{ $uid }}" selected-class="{{ 'profile-list-item '. $classes['profile-list-item'] }}" :theme="{{ $theme == 'color' ? 'true' : 'false' }}" field-theme="{{ $classes['profile-input'] }}"> </nutro-profile-item>
                    <nutro-profile-item label="{{ __('profile.surname') }}" field="{{ $userName[1] }}" field-name="secondname" :uid="{{ $uid }}" selected-class="{{ 'profile-list-item '. $classes['profile-list-item'] }}" :theme="{{ $theme == 'color' ? 'true' : 'false' }}" field-theme="{{ $classes['profile-input'] }}"> </nutro-profile-item>
                    <nutro-profile-item label="{{ __('profile.email') }}" field="{{ $email }}" field-name="email" :uid="{{ $uid }}" selected-class="{{ 'profile-list-item '. $classes['profile-list-item'] }}" :theme="{{ $theme == 'color' ? 'true' : 'false' }}" field-theme="{{ $classes['profile-input'] }}"> </nutro-profile-item>
                    <div class="profile-list-item {{ $classes['profile-list-item'] }}">
                        <a href="{{ route('forgot_password') }}" class="profile-logout {{ $classes['menu-items_link'] }}">{{ __('profile.forgot') }}</a>
                    </div>
                @else
                    <div class="profile-list-item {{ $classes['profile-list-item'] }}">
                        <label for="firstname">{{ __('profile.name') }}: </label>
                        <a href="" class="firstname-link {{ $classes['menu-items_link'] }}">
                            {{ $userName[0] }}
                        </a>
                    </div>
                    <div class="profile-list-item {{ $classes['profile-list-item'] }}">
                        <label for="lastname">{{ __('profile.surname') }}: </label>
                        <a href="" class="lastname-link {{ $classes['menu-items_link'] }}">
                            {{ $userName[1] }}
                        </a>
                    </div>
                    <div class="profile-list-item {{ $classes['profile-list-item'] }}">
                        <label for="firstname">{{ __('profile.email') }}: </label>
                        <a href="" class="email-link {{ $classes['menu-items_link'] }}">
                            {{ $email }}
                        </a>
                    </div>
                @endif
                <div class="profile-list-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" id="logout_link" class="profile-password {{ $classes['menu-items_link'] }}">{{ __('profile.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
