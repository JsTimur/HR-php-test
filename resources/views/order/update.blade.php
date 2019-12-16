@extends('main')
@section('title', 'Изменить')

@section('content')
    <div class="col">
        <h1>
            Редактирование заказа:
        </h1>
        <form action="{{route('order.update.action')}}" method="POST">
            {{ csrf_field() }}

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" name="id" value="{{$order->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="text" name="client_email" class="form-control" value="{{$order->client_email}}" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <lable>Партнер</lable>

                        <select class="form-control" name="partner_id" >
                            @foreach ($partners as $partner)
                                <option value="{{$partner->id}}"
                                        @if ($partner->id == $order->partner->id)
                                        selected
                                        @endif
                                >{{$partner->name}} / {{$partner->email}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>




            <div class="form-group">
                <lable>Продукты</lable>
                <div class="order-products">
                    @foreach ($order->orderproducts as $product)
                        <p>{{$product->product->name}}
                       {{$product->quantity}}
                        шт. </p>
                    @endforeach
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable>Статус заказа</lable>
                        <select class="form-control" name="status" >
                            @foreach (__("statuses") as $key=>$value)
                                <option value="{{$key}}"
                                        @if ($key === $order->status)
                                        selected
                                        @endif
                                >{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Общая стоимость:</p>
                        {{$order->orderFullPrice()}} {{ __('others.currency') }}
                    </div>
                </div>
            </div>

            <button class="btn btn-success" type="submit">Сохранить</button>

        </form>
    </div>
@endsection