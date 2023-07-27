@extends('admin/layouts.base')

@section('main')
    <div>
        @if($games->isEmpty())
            <p>No games available</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <th scope="row">{{ $game->id }}</th>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->price }}</td>
                        <td>{{ $game->description }}</td>
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Редактировать
                            </a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
