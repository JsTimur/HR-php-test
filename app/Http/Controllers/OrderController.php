<?php

namespace App\Http\Controllers;

use App\Events\OrderUpdated;
use App\Http\Requests\UpdateOrder;
use App\Order;
use App\OrderStatus;
use App\Partner;
use App\Services\OrderService;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    /**
     * владка просроченные
     * @param Order $order
     * @return Factory|View
     */
    public function listExpired(Order $order)
    {
        $orders = $order->withEager();
        $orders = $this->service->getExpired($orders)->get();
        return view('order.list', ['orders' => $orders]);
    }

    /**
     * Вкладка текущие
     * @param Order $order
     * @return Factory|View
     */
    public function listCurrent(Order $order)
    {
        $orders = $order->withEager();
        $orders = $this->service->getCurrent($orders)->get();
        return view('order.list', ['orders' => $orders]);
    }

    /**
     * Вкладка Новые
     * @param Order $order
     * @return Factory|View
     */
    public function listNew(Order $order)
    {
        $orders = $order->withEager();
        $orders = $this->service->getNew($orders)->get();
        return view('order.list', ['orders' => $orders]);
    }

    /**
     * Вкладка Завершенные
     * @param Order $order
     * @return Factory|View
     */
    public function listClosed(Order $order) {
        $orders = $order->withEager();
        $orders = $this->service->getClosed($orders)->get();
        return view('order.list', ['orders' => $orders]);
    }

    public function update(Order $order)
    {
        return view('order.update', ['order' => $order, 'partners' => Partner::all()]);
    }

    public function updateAction(UpdateOrder $req)
    {
        $order = Order::findOrFail($req->id);
        if ($order->status !== (int)$req->status && (int)$req->status === OrderStatus::CLOSED) {
            event(new OrderUpdated($order));
        }
        $order->update($req->all());
        return back()->with('message', __('order.updated'));
    }
}
