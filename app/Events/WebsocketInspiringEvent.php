<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Foundation\Inspiring;
use Illuminate\Queue\SerializesModels;

class WebsocketInspiringEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function broadcastAs()
    {
        return 'inspiring-update';
    }

    public function broadcastWith() {
        $inspiring = Inspiring::quote();
        $arr = explode(" - ", $inspiring);

        return [
            'quote' => $arr[0],
            'by' => $arr[1],
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('websocket-inspiring-event');
    }
}
