<?php namespace Ooglee\Application\Entities\Post\Listeners;

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
     * Method called by Dispatcher
     *
     * @param IEvent $event
     * @return void
     */
    public function handle(IEvent $event)
    {
       $this->listenerHandle($event);
    }

    /**
     * Update the post view count
     *
     * @param IEvent $event
     * @return void
     */
    public function listenerHandle(IEvent $event)
    {
       $event->post->count_views++;
       $event->post->save();
       var_dump($event->post->count_views);
    }

}
