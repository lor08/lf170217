<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MaterialHasViewed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $material;
	public $class;

	/**
	 * Create a new event instance.
	 *
	 * @param $material
	 * @param $class
	 */
    public function __construct($material, $class)
    {
		$this->material = $material;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
