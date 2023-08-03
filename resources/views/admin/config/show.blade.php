@extends('admin.layouts.base')

@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>
            Данные настроек
        </div>
    </header>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label for="title">Идентификатор мерчанта</label>
                    <input type="text" class="form-control m-2" name="shop" id="shop"
                           value="{{ $config->shop }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="key">Секретный ключ</label>
                    <input type="text" class="form-control m-2" name="key" id="key"
                           value="{{ $config->key }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="extra_key">Дополнительный Ключ</label>
                    <input type="text" class="form-control m-2" name="extra_key" id="extra_key"
                           value="{{ $config->extra_key }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="curr">Валюта</label>
                    <input type="text" class="form-control m-2" name="curr" id="curr"
                           value="{{ $config->curr }}">
                </div>
            </div>
        </div>
        <div class="container m-0 p-0 pt-2 mb-3">
            <a href="{{ route('configs.index') }}"
               class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                к
                списку</a>
        </div>
    </div>
@endsection
