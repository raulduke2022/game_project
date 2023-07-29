@extends('admin/layouts.base')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="m-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
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
        <div class="container m-0 p-0">
            <form>
                <div class="row">
                    <div class="form-group col-auto w-25">
                        <label for="title">Название игры</label>
                        <input type="text" class="form-control m-2" name="title" id="title"
                               value="{{ old('title', $game->title) }}">
                    </div>
                    <div class="form-group col-auto w-25">
                        <label for="price">Цена</label>
                        <input type="number" class="form-control m-2" name="price" id="price"
                               value="{{ old('price', $game->price) }}">
                    </div>
                    <div class="form-group col-auto w-25">
                        <label for="key">Ключ</label>
                        <textarea rows="2" class="form-control m-2" name="key"
                                  id="key">{{ old('key', $game->key) }}</textarea>
                    </div>
                </div>
                <div class="form-group w-25">
                    <label for="description">Описание</label>
                    <textarea rows="3" class="form-control m-2" name="description"
                              id="description">{{ old('description', $game->description) }}</textarea>
                </div>
                <div class="container m-0 p-0 mt-3">
                    @if($images->count())
                        <div class="mb-2">Изображения</div>
                        <div class="row h-25 overflow-auto image-row m-2">
                            @foreach($images as  $index => $image)
                                <div class="col-md-4 p-2">
                                    <a href="{{ asset('storage/'. $image->path) }}">{{ $image->title }}</a>
                                    <form action="{{ route('images.destroy', $image->id) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else()
                        <div>
                            Изображений нет
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-2">Изменить</button>
                <div class="container m-0 p-0 pt-2 mb-3">
                    <a href="{{ route('games.index') }}"
                       class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                        к
                        списку</a>
                </div>
            </form>
        </div>
@endsection
