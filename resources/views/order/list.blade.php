@extends('main')
@section('title', 'Заказы')

@section('content')
    <div class="col">
        <h1>
            Список заказов
        </h1>
        <ul class="nav nav-tabs">
            <li role="presentation"
                @if (strpos(route('order.list.expired'), request()->path()) !==  FALSE)
                    class="active"
                @endif
            ><a href="{{route('order.list.expired')}}">Просроченные</a></li>
            <li role="presentation"
                @if (strpos( route('order.list.current'), request()->path()) !== FALSE)
                    class="active"
                @endif
            ><a href="{{route('order.list.current')}}">Текущие</a></li>
            <li role="presentation"
                @if (strpos( route('order.list.new'), request()->path()) !== FALSE)
                    class="active"
                @endif
            ><a href="{{route('order.list.new')}}">Новые</a></li>
            <li role="presentation"
                @if (strpos( route('order.list.closed'), request()->path()) !== FALSE)
                    class="active"
                @endif
            ><a href="{{route('order.list.closed')}}">Выполненные</a></li>
        </ul>

        <table class="table table-striped">
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
                    <th scope="row">
                        <a href="{{route('order.update', ['id'=>$order->id])}}">
                        {{$order->id}}
                        </a>
                    </th>
                    <td>{{$order->partner->name}}</td>
                    <td>{{$order->orderFullPrice()}} {{ __('others.currency') }}</td>
                    <td>
                        @foreach ($order->orderproducts as $product)
                            <p>{{$product->product->name}},
                                {{$product->quantity}} шт.,
                                {{$product->price}} {{ __('others.currency') }}</p>
                        @endforeach
                    </td>
                    <td>{{ __("statuses.$order->status")}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection