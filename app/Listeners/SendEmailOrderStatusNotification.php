<?php

namespace App\Listeners;

use App\Events\OrderStatus;
use App\Jobs\ChangeOrderStatusEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOrderStatusNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderStatus  $event
     * @return void
     */
    public function handle(OrderStatus $order)
    {
        dispatch(new ChangeOrderStatusEmailJob($order->order));
    }
}
