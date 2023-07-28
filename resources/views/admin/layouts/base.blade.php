<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container-fluid m-0 p-0">
    <div class="row d-flex align-items-stretch">
        <div class="col-md-12">
            @include('admin/layouts.navbar')
        </div>
        <div class="col-md-auto">
            @include('admin/layouts.sidebar')
        </div>
        <div class="col main-col ">
            @include('admin/layouts.main')
        </div>
{{--        <div>--}}
{{--            @include('admin/layouts.footer')--}}
{{--        </div>--}}
    </div>
</div>
</body>
</html>
