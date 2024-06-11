@extends('layouts.app')

@section('content')
    <div class="login-block">
        <div class="text_login">
            <h2>Регистрация</h2>
        </div>
        <div class="form">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Имя">
                </div>
                <div class="input">
                    <input type="text" name="email" id="email" placeholder="Почта">
                </div>
                <div class="input">
                    <input type="password" name="password" id="password" placeholder="Пароль">
                </div>
                <div class="btn2">
                    <button type="submit">Регистрация</button>
                </div>
            </form>
        </div>
    </div>
    <div class="ads">
        <img src="{{ asset('img/intel.png') }}" alt="">
        <p>
            Новые процессоры Intel Core Ultra: Более 500 моделей с искусственным интеллектом <br>
            <br>
            Компания Intel объявила о выпуске более 500 моделей с искусственным интеллектом, работающих на новых процессорах
            Intel Cor Ultra - лучшем в отрасли процессоре для ПК с искусственным интеллектом, доступном на сегодняшний день
            на рынке.
    </div>
@endsection
