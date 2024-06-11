@extends('layouts.app')

@section('content')
    <div class="login-block">
        <div class="text_login">
            <h2>Вход</h2>
        </div>
        <div class="form">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input">
                    <input type="text" name="email" id="email" placeholder="Почта">
                </div>
                <div class="input">
                    <input type="password" name="password" id="password" placeholder="Пароль">
                </div>
                <div class="btn">
                    <a href="{{ route('register') }}" class="a button"><button type="button">Регистрация</button></a>
                    <button type="submit">Вход</button>
                </div>
            </form>
        </div>
    </div>

    <div class="ads">
        <img src="{{ asset('img/nvid.png') }}" alt="">
        <p>
            Проведите тест-драйв бета-версии NVIDIA app <br>
            <br>
            Ранняя бета-версия NVIDIA app включает многие полезные функции из других приложений NVIDIA и упрощает их
            использование. Для активации бандлов и бонусов предусмотрена опциональная регистрация. Также приложение
            предлагает новые RTX-возможности, улучшающие игры и творчество.
        </p>
    </div>
@endsection
