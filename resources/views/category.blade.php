@extends('layouts.app')

@section('content')
    <div class="full_kat">
        <div class="text_login">
            <h2 class="kat2">{{ $category->name }}</h2>
        </div>
        @if (count($category->products) > 0)
            <div class="tovar">
                @foreach ($category->products as $item)
                    <div class="name_tovar">
                        <img src="{{ asset($item->photo) }}" alt="">
                        <div class="text_tovar">
                            <a href="">{{ $item->name }}</a>
                            <h1>{{ $item->price }} ₽</h1>
                            <div class="butt_tovar">
                                <a href="{{ route('OpenProduct', ['product_id' => $item->id]) }}"><button
                                        class="col_butt">Подробнее</button></a>
                                <a href="{{ route('AddBasket', ['tovar_id' => $item->id]) }}"><button class="butt_color">В
                                        корзину</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h3>Товара нет в наличии</h3>
        @endif
    </div>
@endsection
