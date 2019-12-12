<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = Order::with('partner', 'orderproducts');
        $orders = Order::orderBy('id')->paginate(100);
        return view('pages.orders', ['orders' => $orders]);
    }
}
