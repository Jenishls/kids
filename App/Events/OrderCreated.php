<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $phone;
    public $name;
    public $message;
    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, $order, $message)
    {
        $this->email = $request->email;   
        $this->phone = $request->phone;  
        $this->name = $request->first_name." ".$request->last_name;
        $this->message = $message; 
        $this->order = $order;
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
