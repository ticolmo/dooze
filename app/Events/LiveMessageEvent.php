<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LiveMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pseudo;
    public $message;
    public $liveid;

    /**
     * Create a new event instance.
     */
    public function __construct(string $pseudo, string $message,$liveid)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->liveid = $liveid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

     /* pour écouter le channel */
    public function broadcastOn()
    {
       /* si chaine public */
        /* return [
            new Channel('live'),
        ]; */

        return new PresenceChannel('live.'.$this->liveid);
        
    }

    
    public function broadcastAs()
    {
        return 'live-message';
    }
}
