@extends('main')
@section('title', 'Заказы')

@section('content')
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ид_заказа</th>
                <th scope="col">название_партнера</th>
                <th scope="col">стоимость_заказа</th>
                <th scope="col">наименование_состав_заказа</th>
                <th scope="col">статус_заказа</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->partner->name}}</td>
                    <td>{{$order->orderproducts->sum(function ($prod) {
                        return $prod->quantity * $prod->price;
                    })}} р.</td>
                    <td>
                        @foreach ($order->orderproducts as $product)
                            <p>{{$product->product->name}},
                            {{$product->quantity}} шт.,
                             {{$product->price}} р.</p>
                        @endforeach
                    </td>
                    <td>{{ __("statuses.$order->status")}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection