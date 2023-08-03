@extends('admin/layouts.base')

@section('main')
    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif
    <header class="main-header">
        <div>Настройки платежной системы</div>
    <div class="d-flex justify-content-start">
        <a href="{{ route('configs.create') }}" class="btn btn-warning">Добавить новую запись</a>
    </div>
    </header>
    <div class="index-table">
        @if($configs->isEmpty())
            <p>Тут пока ничего нет...</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col">Идентификатор мерчанта</th>
                    <th scope="col" class="col">Секретный ключ</th>
                    <th scope="col">Доп Ключ</th>
                    <th scope="col">Валюта</th>
                    <th scope="col" class="col-md-2">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($configs as $index => $config)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $configs->firstItem() - 1 }}</th>
                        <td class="table-td">{{ $config->shop }}</td>
                        <td class="table-td">{{ $config->key }}</td>
                        <td class="table-td">{{ $config->extra_key }}</td>
                        <td class="table-td">{{ $config->curr }}</td>
                        <td>
                            <a href="{{ route('configs.show', $config->id) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('configs.edit', $config->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('configs.destroy', $config->id) }}" method="POST"
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
        {{$configs->onEachSide(2)->links('pagination::bootstrap-5')}}
    </div>
@endsection
