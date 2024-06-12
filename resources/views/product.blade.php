@extends('layouts.app')

@section('content')
    <div class="full_kat">
        <div class="text_login">
            <h2 class="kat2">О товаре</h2>
        </div>
        <div class="info">
            <div class="info_one">
                <div class="block_img">
                    <img src="{{ asset($product->photo) }}" alt="">
                </div>
                <div class="block_text">
                    <p class="fs_24">{{ $product->price }} ₽</p>
                    <a href="{{ route('BuyProduct', ['product_id' => $product->id]) }}"><button
                            class="butt_color">Купить</button></a>
                </div>
            </div>
            <div class="info_two">
                <div class="info_xar">
                    <h1 class="fs_24">{{ $product->name }}</h1>
                    <div class="xar_text">
                        <ul class="text_li">
                            {{ $product->description }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
