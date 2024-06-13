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
                <button type="button">
                    <form id="avatar-file-form" method="POST" enctype="multipart/form-data"
                        action="{{ route('NewAvatar') }}">
                        @csrf
                        @method('PUT')
                        <input type="file" class="custom-file-input" name="avatar_change" id="avatar_change">
                    </form>
                </button>
                <button id="editUsername">Изменить имя</button>
                @if (Auth::user()->is_admin == 1)
                    <button type="button"><a href="{{ route('OpenAdmin') }}">Панель управления</a></button>
                @endif
                <button>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Выйти
                    </a>
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>

        <div class="block_lk2">
            <div class="text_login">
                @if (count($buy_product) > 0)
                    <h2>История покупок</h2>
                    <div class="pok_block">
                        @foreach ($buy_product as $item)
                            <div class="pokypka">
                                <img src="{{ asset($item->product->photo) }}" alt="">
                                <div class="pok_tovar">
                                    <a
                                        href="{{ route('OpenProduct', ['product_id' => $item->product->id]) }}">{{ $item->product->name }}</a>
                                    <h1>{{ $item->product->price }} ₽</h1>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h2>Вы еще не совершали покупок</h2>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.getElementById('avatar_change').addEventListener('change', function() {
            document.getElementById('avatar-file-form').submit();
        });

        const reworkUsernameBtn = document.getElementById('editUsername');
        reworkUsernameBtn.addEventListener('click', editUsername);

        function editUsername() {
            let result2 = prompt("Введите новое имя");
            const form2 = document.createElement('form');
            form2.method = 'POST';
            form2.action = `/edit_name`;
            const csrfField2 = document.createElement('input');
            csrfField2.type = 'hidden';
            csrfField2.name = '_token';
            csrfField2.value = '{{ csrf_token() }}';
            const numberField2 = document.createElement('input');
            numberField2.type = 'hidden';
            numberField2.name = 'username';
            numberField2.value = result2;
            form2.appendChild(csrfField2);
            form2.appendChild(numberField2);
            document.body.appendChild(form2);
            form2.submit();
        }
    </script>
@endsection
