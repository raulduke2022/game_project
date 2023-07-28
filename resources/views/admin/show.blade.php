@extends('admin/layouts.base')

@section('main')
    <header class="main-header">
        <div>
            Данные карточки
        </div>
    </header>
    <div class="form-group m-3 w-25">
        <label for="title">Название игры</label>
        <input type="text" class="form-control m-2" name="title" id="title" value="{{ old('title', $game->title) }}">
    </div>
    <div class="form-group m-3 w-25">
        <label for="description">Описание</label>
        <textarea rows="3" class="form-control m-2" name="description"
                  id="description">{{ old('description', $game->description) }}</textarea>
    </div>
    <div class="form-group m-3 w-25">
        <label for="price">Цена</label>
        <input type="number" class="form-control m-2" name="price" id="price" value="{{ old('price', $game->price) }}">
    </div>
    <div class="form-group m-3 w-25">
        <label for="key">Ключ</label>
        <textarea rows="2" class="form-control m-2" name="key" id="key">{{ old('key', $game->key) }}</textarea>
    </div>
    <div>
        <img src="{{ asset('games/411/1hAF16Bk1ucIgvgwS4rj94DG7S4Ee8ew9M4JDasN.png') }}"/>
        <img src="/games/411/1hAF16Bk1ucIgvgwS4rj94DG7S4Ee8ew9M4JDasN.png"/>
        @foreach($images as $image)
            {{ $image->path }} {{$image->title }}
        @endforeach
    </div>
    <a href="{{ route('games.index') }}"
       class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ms-4">Вернуться к
        списку</a>

@endsection
