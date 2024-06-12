@extends('layouts.app')

@section('content')
    <div class="full_kat">
        @if (count($basket) > 0)
            <div class="text_login">
                <h2 class="kat2">Корзина</h2>
            </div>
            <div class="tovar">
                @foreach ($basket as $item)
                    <div class="name_tovar">
                        <img src="{{ $item->product->photo }}" alt="">
                        <div class="text_tovar">
                            <a href="/pages/katalog.html">{{ $item->product->name }}</a>
                            <h1>{{ $item->product->price }} ₽</h1>
                            <div class="butt_tovar">
                                <a href="{{ route('OpenProduct', ['product_id' => $item->product->id]) }}"><button
                                        class="col_butt">Подробнее</button></a>
                                <a href="{{ route('BuyProduct', ['product_id' => $item->product->id]) }}"><button
                                        class="butt_color">Купить</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text_login">
                <h2 class="kat2">Корзина пуста</h2>
            </div>
        @endif
    </div>
@endsection
