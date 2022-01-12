@extends('layouts.nutro')

@section('content')
    <div class="wrap wrap-color">
        <div class="title-container">
            <div class="page-title text-white">
                <h1 class="page-title-m">Подтвердите почту</h1>
            </div>
        </div>
        <div class="content">
            <div class="block block-about">
                <p class="p-black text-white">
                    Для полноценного использования профиля и статистики, Вам необходимо подтвердить аккаун по ссылке, отправленной на указанный Вами адрес электронной почты.
                </p>
                <a href="{{ route('mainpage') }}">На главную</a>
            </div>
        </div>
    </div>
@endsection
