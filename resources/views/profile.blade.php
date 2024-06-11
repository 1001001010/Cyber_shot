@extends('layouts.app')

@section('content')
    <div class="menu_lk">
        <div class="block_red">
            <div class="block_lk">
                @if (Auth::user()->photo == null)
                    <img src="{{ asset('img/ava.png') }}" alt="" class="avatar">
                @else
                    <img src="{{ Auth::user()->photo }}" alt="" class="avatar">
                @endif
                <div class="name_avatar">
                    <div class="name1">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="name1">
                        @if (Auth::user()->amount_buy == 0)
                            <p>Нет покупок</p>
                        @else
                            <p>Число покупок: {{ Auth::user()->amount_buy }}</p>
                        @endif
                    </div>

                </div>
            </div>
            <h2 class="ff_fs">Редактирование</h2>
            <div class="block_3">
                <form id="avatar-file-form" method="POST" enctype="multipart/form-data" action="{{ route('NewAvatar') }}">
                    @csrf
                    @method('PUT')
                    <input type="file" class="custom-file-input" name="avatar_change" id="avatar_change">
                </form>
                <button>Изменить имя</button>
            </div>
        </div>

        <div class="block_lk2">
            <div class="text_login">
                <h2>История покупок</h2>
                <div class="pok_block">
                    <div class="pokypka">
                        <img src="/img/tovar.png" alt="">
                        <div class="pok_tovar">
                            <a href="/pages/katalog.html">Видеокарта ASUS GeForce RTX 4080 ProArt OC edition
                                [PROART-RTX4080-O16G]</a>
                            <h1>165.999 ₽</h1>
                        </div>
                    </div>
                    <div class="pokypka">
                        <img src="/img/tovar.png" alt="">
                        <div class="pok_tovar">
                            <a href="/pages/katalog.html">Видеокарта ASUS GeForce RTX 4080 ProArt OC edition
                                [PROART-RTX4080-O16G]</a>
                            <h1>165.999 ₽</h1>
                        </div>
                    </div>
                    <div class="pokypka">
                        <img src="/img/tovar.png" alt="">
                        <div class="pok_tovar">
                            <a href="/pages/katalog.html">Видеокарта ASUS GeForce RTX 4080 ProArt OC edition
                                [PROART-RTX4080-O16G]</a>
                            <h1>165.999 ₽</h1>
                        </div>
                    </div>
                    <div class="pokypka">
                        <img src="/img/tovar.png" alt="">
                        <div class="pok_tovar">
                            <a href="/pages/katalog.html">Видеокарта ASUS GeForce RTX 4080 ProArt OC edition
                                [PROART-RTX4080-O16G]</a>
                            <h1>165.999 ₽</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('avatar_change').addEventListener('change', function() {
            document.getElementById('avatar-file-form').submit();
        });
    </script>
@endsection
