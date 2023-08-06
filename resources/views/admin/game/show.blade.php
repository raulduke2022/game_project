@extends('admin/layouts.base')

@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>
            Данные карточки
        </div>
    </header>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label for="title">Название игры</label>
                    <input type="text" class="form-control m-2" name="title" id="title"
                           value="{{ $game->title }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" class="form-control m-2" name="price" id="price"
                           value="{{ $game->price }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="introduction">Мини описание</label>
                    <textarea rows="2" class="form-control m-2" name="introduction"
                              id="introduction">{{ $game->introduction }}</textarea>
                </div>
            </div>
        </div>
        <div class="container m-0 p-0">
            <div class="form-group w-50">
                <label for="description">Описание</label>
                <textarea rows="3" class="form-control m-2" name="description"
                          id="description">{{ $game->description }}</textarea>
            </div>
        </div>
        {{--                        <img style="height: 8rem; width: 8rem" class="img-fluid"--}}
        {{--                             src="{{ asset('storage/'. $image->path) }}"--}}
        {{--                             alt="{{ $image->title }}">--}}
        <div class="container m-0 p-0 mt-3">
            @if($images->count())
                <div class="mb-2">Изображения</div>
                <div class="row h-25 overflow-auto image-row m-2">
                    @foreach($images as  $index => $image)
                        <div
                            class="m-1 col-md-4 p-2 border {{ $image->is_main ? 'border-warning' : '' }} d-flex justify-content-center">
                            <a href="{{ asset($image->path) }}">Посмотреть</a>
                        </div>
                    @endforeach
                </div>
            @else()
                <div>
                    Изображений нет
                </div>
            @endif
        </div>
        <div class="container m-0 p-0 pt-2 mb-3">
            <a href="{{ route('games.index') }}"
               class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                к
                списку</a>
        </div>
    </div>
@endsection
