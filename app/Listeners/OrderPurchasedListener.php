<?php

namespace App\Listeners;

use App\Events\OrderPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\FiscalService;

class OrderPurchasedListener
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
     * @param  \App\Events\OrderPurchased  $event
     * @return void
     */
    public function handle(OrderPurchased $event)
    {
        //PDV service
        //open view for printing parsing FiscalService::printNote($event->order->toPrint) function result
        FiscalService::printNote($event->order);

        //PDV service (Optional)
        //generate NF-e and save it to order unsing FiscalService::makeNFe($event->order->id);
    }
}
