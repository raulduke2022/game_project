@extends('admin/layouts.base')

@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>
            Данные заказа
        </div>
    </header>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label>Номер платежа</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->id }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Внутренний номер платежа </label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->payeer_operation_id }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Способ оплаты</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->operation_ps }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label>Сумма платежа</label>
                    <input type="number" class="form-control m-2"
                           value="{{ $order->amount }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Валюта платежа </label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->curr }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Описание платежа </label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->desc }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Статус платежа</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->status === "success" ? "Оплачен" : "В процессе" }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Статус заказа</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->is_done ? "Обработан" : "Не обработан" }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label>Электронная почта</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->user_email }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">IP адрес</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->user_ip }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">User Agent</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->user_agent }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Игра</label>
                    <input type="text" class="form-control m-2"
                           value="{{ $order->game->title }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Дата и время формирования операции</label>
                    <input type="datetime-local" class="form-control m-2"
                           value="{{ $order->operation_date }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group">
                    <label for="price">Дата и время выполнения платежа</label>
                    <input type="datetime-local" class="form-control m-2"
                           value="{{ $order->operation_pay_date }}">
                </div>
            </div>
        </div>
        <div class="container m-0 p-0 pt-2 mb-3">
            <a href="{{ route('orders.index') }}"
               class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Вернуться
                к
                списку</a>
        </div>
    </div>
@endsection
