<header class="header">
    <div class="header-cont grid">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="" class="logo">
            </a>
        </div>
        <div class="top_text">
            <a href="{{ route('Basket') }}">Корзина</a>
            <a href="{{ route('profile') }}" class="ml-90">
                @guest
                    Вход
                @else
                    Профиль
                @endguest
            </a>
        </div>
    </div>
</header>
