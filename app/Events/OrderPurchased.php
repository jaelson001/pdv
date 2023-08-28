<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderPurchased
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /** 
     * @see https://github.com/nicolascgarcia/node_printer
     */

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( public Order $order)
    {
        //o listener irá enxergar o pedido agora que tem um construtor com ele
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
