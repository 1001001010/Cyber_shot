@extends('layouts.app')

@section('content')
    <main class="menu">
        <div class="menu_text">
            <h1>Выберите необходимый вам продукт</h1>
        </div>
        <div class="kat">
            <div class="kat1">
                <a href="/pages/katalog.html">Видеокарта</a>
            </div>
            <div class="kat1">
                <a href="">Оперативная память</a>
            </div>
            <div class="kat1">
                <a href="">Материнская плата</a>
            </div>
            <div class="kat1">
                <a href="">HDD</a>
            </div>
            <div class="kat1">
                <a href="">Процессор</a>
            </div>
            <div class="kat1">
                <a href="">Блок питания</a>
            </div>
            <div class="kat1">
                <a href="">SSD</a>
            </div>
            <div class="kat1">
                <a href="">Корпус</a>
            </div>
            <div class="kat1">
                <a href="">Прочее</a>
            </div>
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
@endsection
