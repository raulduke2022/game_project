@extends('admin/layouts.base')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger m-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="m-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>
            Редактирование карточки
        </div>
    </header>
    <form action="{{ route('games.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT')
        <form>
            <div class="form-group m-3 w-25">
                <label for="title">Название игры</label>
                <input type="text" class="form-control m-2" name="title" id="title"
                       value="{{ old('title', $game->title) }}">
            </div>
            <div class="form-group m-3 w-25">
                <label for="description">Описание</label>
                <textarea rows="3" class="form-control m-2" name="description"
                          id="description">{{ old('description', $game->description) }}</textarea>
            </div>
            <div class="form-group m-3 w-25">
                <label for="price">Цена</label>
                <input type="number" class="form-control m-2" name="price" id="price"
                       value="{{ old('price', $game->price) }}">
            </div>
            <div class="form-group m-3 w-25">
                <label for="key">Ключ</label>
                <textarea rows="2" class="form-control m-2" name="key" id="key">{{ old('key', $game->key) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary ms-4">Изменить</button>
            <a href="{{ route('games.index') }}"
               class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ms-2">Вернуться
                к списку</a>
        </form>
    </form>
@endsection
