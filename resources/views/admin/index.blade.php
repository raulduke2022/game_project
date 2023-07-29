@extends('admin/layouts.base')

@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>Данные по ключам</div>
    <div class="d-flex justify-content-start">
        <a href="{{ route('games.create') }}" class="btn btn-warning">Добавить ключ</a>
    </div>
    </header>
    <div class="index-table">
        @if($games->isEmpty())
            <p>Тут пока ничего нет...</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-md-2">Название</th>
                    <th scope="col" class="col-md-4">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col" class="col-md-2">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $index => $game)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $games->firstItem() - 1 }}</th>
                        <td class="table-td">{{ $game->title }}</td>
                        <td class="table-td">{{ $game->description }}</td>
                        <td class="table-td">{{ $game->price }}</td>
                        <td>
                            <a href="{{ route('games.show', $game->id) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
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
        {{$games->onEachSide(2)->links('pagination::bootstrap-5')}}
    </div>
@endsection
