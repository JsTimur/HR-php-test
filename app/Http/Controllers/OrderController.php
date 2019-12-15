<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders =  Order::with('partner', 'orderproducts')->orderBy('id')->paginate(100);
        return view('order.list', ['orders' => $orders]);
    }

    public function update(Order $order) {
        return view('order.update', ['order' => $order]);
    }
}
