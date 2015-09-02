<?php namespace Ooglee\Application\Listeners;

use Ooglee\Domain\Contracts\IEvent;
use Ooglee\Domain\Contracts\IListener;

class IncrementPostViewsListener implements IListener
{
    /**
     * Create the event handler.
     *
     */
    public function __construct()
    {
        
    }

    /**
     * Update the post view count
     *
     * @param PostWasViewed $event
     * @return void
     */
    public function listenerHandle(IEvent $event)
    {
       $event->post->count_views++;
       $event->post->save();
       var_dump($event->post->count_views);
    }

}
