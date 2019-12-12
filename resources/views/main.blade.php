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

<div class="container">
    <div class="row">
            @yield('content')
    </div>
</div>

<script src="{{ url('js/app.js') }}"></script>
</body>
</html>
