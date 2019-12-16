@extends('main')
@section('title', 'Продукты')

@section('content')
    <div class="col">
        <h1>
            Список продуктов
        </h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ид_продукта</th>
                <th scope="col">наименование_продукта</th>
                <th scope="col">наименование_поставщика</th>
                <th scope="col">цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->vendor->name}}</td>
                    <td>
                        <form action="POST" class="js-form-update-price">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="text" class="form-control" name="price" value="{{$product->price}}">
                            {{ __('others.currency') }}
                            <button type="submit">🖫</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        {{ $products->links() }}
    </div>
@endsection