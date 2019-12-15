@extends('main')
@section('title', 'Изменить')

@section('content')
    <div class="col">
        <form action="/orderupdate" method="post">
            @csrf
            <input type="text" value="{{$order->client_email}}"/>
        </form>
    </div>
@endsection