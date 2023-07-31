@extends('admin/layouts.base')
@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>Данные по заказам</div>
        <div class="btn-group">
            <button type="button" class="btn btn-warning">Фильтр</button>
            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu p-2">
                <li><a class="dropdown-item mb-1" href="{{ route('orders.index', ['is_done' => 'false']) }}">Новые</a></li>
                <li><a class="dropdown-item mb-1" href="{{ route('orders.index', ['is_done' => 'true']) }}">Обработанные</a></li>
                <li><a class="dropdown-item mb-1" href="{{ route('orders.index') }}">Показать все</a></li>
            </ul>
        </div>
    </header>
    <div class="index-table">
        @if($orders->isEmpty())
            <p>Тут пока ничего нет...</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-md-2">Название</th>
                    <th scope="col">Игра</th>
                    <th scope="col" class="col-md-4">Статус</th>
                    <th scope="col" class="col-md-2">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $orders->firstItem() - 1 }}</th>
                        <td class="table-td">{{ $order->payeer }}</td>
                        <td class="table-td"><a href="{{ route('games.show', $order->game->id) }}" style="text-decoration: none; color:green">{{ $order->game->title }}</a></td>
                        <td @if($order->id == session('id')) class="table-td bg-warning"
                            @else class="table-td" @endif>{{ $order->is_done ? "Обработан" : "Новый"}}</td>
                        <td>
                            {{--                            <a href="{{ route('games.show', $order->id) }}" class="btn btn-success">--}}
                            {{--                                <i class="fa-solid fa-eye"></i>--}}
                            {{--                            </a>--}}
                            {{--                            <a href="{{ route('games.edit', $order->id) }}" class="btn btn-primary">--}}
                            {{--                                <i class="fa fa-edit"></i>--}}
                            {{--                            </a>--}}
                            <form action="{{ route('orders.toggle', $order->id) }}" method="POST"
                                  style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn {{ $order->is_done ? 'btn-danger' : 'btn-success'}}">
                                    {!! $order->is_done ? '<i class="fa fa-x"></i>' : '<i class="fa fa-check"></i>' !!}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div>
        {{$orders->onEachSide(2)->links('pagination::bootstrap-5')}}
    </div>
@endsection
