@extends('admin.layouts.base')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="m-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>
            Создание записи
        </div>
    </header>
    <form action="{{ route('configs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container m-0 p-0">
            <form>
                <div class="row">
                    <div class="form-group  w-25 col-auto">
                        <label for="shop">Идентификатор мерчанта</label>
                        <input type="text" class="form-control m-2" name="shop" id="shop" value="{{ old('shop') }}">
                    </div>
                    <div class="form-group  w-25 col-auto">
                        <label for="extra_key">Секретный ключ</label>
                        <input type="text" class="form-control m-2" name="key" id="key"
                               value="{{ old('key') }}">
                    </div>
                    <div class="form-group  w-25 col-auto">
                        <label for="extra_key">Дополнительный Ключ</label>
                        <input type="text" class="form-control m-2" name="extra_key" id="extra_key"
                               value="{{ old('extra_key') }}">
                    </div>
                    <div class="form-group  w-25 col-auto">
                        <label for="curr">Валюта</label>
                        <input type="text" class="form-control m-2" name="curr" id="curr"
                               value="{{ old('curr') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Создать</button>
                <div class="container m-0 p-0 pt-2 mb-3">
                    <a href="{{ route('games.index') }}"
                       class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                        к
                        списку</a>
                </div>
            </form>
        </div>
@endsection
