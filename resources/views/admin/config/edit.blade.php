@extends('admin/layouts.base')

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
            Редактирование настроек
        </div>
    </header>
    <div class="container m-0 p-0 g-5">
        <div class="row m-0 p-0">
            <div class="col-8 m-0 p-0">
                <form action="{{ route('configs.update', $config->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container m-0 p-0">
                        <div class="row">
                            <div class="form-group w-50">
                                <label for="title">Идентификатор мерчанта</label>
                                <input type="text" class="form-control m-2" name="shop" id="shop"
                                       value="{{ old('shop', $config->shop) }}">
                            </div>
                            <div class="form-group w-50">
                                <label for="price">Секретный ключ</label>
                                <input type="text" class="form-control m-2" name="key" id="key"
                                       value="{{ old('key', $config->key) }}">
                            </div>
                            <div class="form-group w-50">
                                <label for="key">Дополнительный Ключ</label>
                                <input type="text" class="form-control m-2" name="extra_key" id="extra_key"
                                       value="{{ old('extra_key', $config->extra_key) }}">
                            </div>
                            <div class="form-group w-50">
                                <label for="key">Валюта</label>
                                <input type="text" class="form-control m-2" name="curr" id="curr"
                                       value="{{ old('curr', $config->curr) }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Обновить настройки</button>
                        <div class="container m-0 p-0 pt-2 mb-3">
                            <a href="{{ route('configs.index') }}"
                               class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                                к
                                списку</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
