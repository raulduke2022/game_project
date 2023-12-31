@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Главная страница') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы в системе! Перейдите в ') }} <a href="{{ route('admin') }}" style="text-decoration: none; color: green">Админ панель</a><span>, если у вас есть права администратора</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
