@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel_min_add">
            <h2>Добавить товар</h2>
            <form action="{{ route('AddProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Название товара">
                </div>
                <div class="input">
                    <input type="text" name="description" id="description" placeholder="Характеристики">
                </div>
                <div class="input">
                    <input type="number" name="price" id="price" placeholder="Цена">
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
                <div class="input">
                    <input type="file" name="photo" id="photo" placeholder="Фото товара"
                        class="custom-file-input file-input">
                </div>
                <button class="vvod_butt" type="submit">Добавить</button>
            </form>
        </div>
        {{-- <div class="panel_min">
            <h2>Редактировать товар</h2>
            <div class="input">
                <input type="text" name="" id="" placeholder="Название товара">
            </div>
            <div class="input">
                <input type="text" name="" id="" placeholder="Характеристики">
            </div>
            <div class="input">
                <input type="text" name="" id="" placeholder="Фото товара">
            </div>
            <button class="vvod_butt">Применить</button>
        </div>
        <div class="panel_min">
            <h2>Удалить товар</h2>
            <div class="input">
                <input type="text" name="" id="" placeholder="Название товара">
            </div>
            <button class="vvod_butt">Добавить</button>
        </div> --}}
    </div>
@endsection
