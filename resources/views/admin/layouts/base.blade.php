<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/auth.js'])
    <title>Admin</title>
</head>
<body>
<div class="container main-container">
    <div class="row d-flex align-items-stretch">
        <div class="col-md-12 m-0 p-0">
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
