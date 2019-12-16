<p>
    Заказ №{{$order->id}} завершен
</p>
<ul>
    @foreach ($order->orderproducts as $product)
        <li>
            <p>
                {{$product->product->name}},
                {{$product->quantity}} шт.,
                {{$product->price}} {{ __('others.currency') }}
            </p>
        </li>
    @endforeach
</ul>
<p>Стоимость заказа: {{$order->orderFullPrice()}} {{ __('others.currency') }}</p>