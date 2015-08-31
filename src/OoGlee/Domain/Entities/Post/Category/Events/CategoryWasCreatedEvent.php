<?php namespace Ooglee\Domain\Entities\Post\Category\Events;

use Ooglee\Domain\Entities\Post\Category\Category;
use Ooglee\Domain\Entities\AEvent;
use Ooglee\Domain\Contracts\IEvent;

class CategoryWasCreatedEvent extends AEvent implements IEvent
{
    /**
     * Domain Event, which our application might dispatch after a Category is created
     */
    
    /**
     *
     * @var Category 
     */
    public $category;

    /**
     * Create a new event instance.
     *
     * @param  Category 
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
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