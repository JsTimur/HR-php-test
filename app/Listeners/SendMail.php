<?php

namespace App\Listeners;

use App\Events\OrderUpdated;
use App\Mail\OrderClosed;
use App\Order;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderUpdated  $event
     * @return void
     */
    public function handle(OrderUpdated $event)
    {
        $mailTo = [];
        $vendorsMail = $event->order->orderproducts->pluck('product')->pluck('vendor')->pluck('email')->unique()->toArray();
        $mailTo = array_merge([$event->order->partner->email], $vendorsMail);
        foreach ($mailTo as $mail) {
            Mail::to($mail)->send(new OrderClosed($event->order));
        }
    }
}
