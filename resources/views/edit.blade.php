@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel_min_add">
            <h2>Добавить товар</h2>
            <form action="{{ route('EditProduct', ['product_id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Название товара"
                        value="{{ $product->name }}">
                </div>
                <div class="input">
                    <input type="text" name="description" id="description" placeholder="Характеристики"
                        value="{{ $product->description }}">
                </div>
                <div class="input">
                    <input type="number" name="price" id="price" placeholder="Цена" value="{{ $product->price }}">
                </div>
                <div class="input">
                    <select id="category_id" name="category_id" class="category-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="vvod_butt" type="submit">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
