<?php namespace Ooglee\Domain\Entities\Post\Events;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Domain\Entities\AEvent;
use Ooglee\Domain\Contracts\IEvent;


class PostWasCreatedEvent extends AEvent implements IEvent
{
    /**
     * Domain Event, which our application might dispatch after a Post is registered
     */
    
    /**
     *
     * @var Post 
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param  Post 
     */
    public function __construct(IPost $post)
    {
        $this->post = $post;
    }

    /**
     * Return the event name
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }

}