@extends('layouts.app') {{-- Указание макета, унаследованного этим представлением --}}

@section('content') {{-- Опеределяем секцию контента --}}
    <main class="menu">
        <div class="menu_text">
            <h1>Выберите необходимый вам продукт</h1>
        </div>
        <div class="kat">
            @foreach ($categories as $item) {{-- Перебираем все категории через цикл --}}
                <div class="kat1">
                    <a href="{{ route('OpenCategory', ['category_name' => $item->link]) }}">{{ $item->name }}</a> {{-- Ссылка на открытие категории, в которой мы передаем ссылку на категорию, а в название выводим название категории --}}
                </div>
            @endforeach {{-- Конец цикла --}}
        </div>
        <div class="ads">
            <img src="{{ asset('img/amd.png') }}" alt="">
            <p>
                AMD презентовала новые процессоры с самым мощным ИИ-ускорителем
                <br>
                <br>
                Новая линейка процессоров AMD Ryzen Embedded 8000 — это фактически та же мобильная линейка APU Ryzen 8000
                с похожими характеристиками. Однако фишкой чипов является увеличенная мощность встроенного XDNA
                NPU-кластера, отвечающего за нейровычисления.
            </p>
        </div>
    </main>
@endsection {{-- Закрываем секцию контента --}}
