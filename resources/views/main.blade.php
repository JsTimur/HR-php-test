<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/app.css') }}" >
    <link rel="stylesheet" href="{{ url('css/style.css') }}" >

</head>
<body>

<div class="header ">
    <div class="container">
        <div class="row menu-box">
            <div class="col">
                <a class="btn btn-link" href="{{route('weather')}}">
                    Погода в Брянске
                </a>
                <a class="btn btn-link" href="{{route('order.list.expired')}}">
                    Список заказов
                </a>
                <a class="btn btn-link" href="{{route('product.list')}}">
                    Список продуктов
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
            @yield('content')
    </div>
</div>

<script src="{{ url('js/app.js') }}"></script>
<script src="{{ url('js/script.js') }}"></script>
</body>
</html>
