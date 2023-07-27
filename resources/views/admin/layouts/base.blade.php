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
    <div class="row g-0">
        <div class="m-0 p-0">
            @include('admin/layouts.navbar')
        </div>
        <div class="col-auto">
            @include('admin/layouts.sidebar')
        </div>
        <div class="col" style="margin: 3rem;">
            @include('admin/layouts.main')
        </div>
    </div>
</div>
</body>
</html>
