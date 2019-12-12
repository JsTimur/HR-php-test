@extends('main')
@section('title', 'Главная')

@section('content')
    <p>
        Дата:
        {{ date('Y-m-d H:i:s') }}
    </p>
    <p>
        Город:
        {{$city['name']}}
    </p>
    <p>
        Температура:
        {{$city['value']}}
    </p>

@endsection