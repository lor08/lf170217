<?php

namespace App\Listeners;

use App\Events\MaterialHasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Counter
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
     * @param  MaterialHasViewed  $event
     * @return void
     */
    public function handle(MaterialHasViewed $event)
    {
		$event->material->increment('views');
    }
}
