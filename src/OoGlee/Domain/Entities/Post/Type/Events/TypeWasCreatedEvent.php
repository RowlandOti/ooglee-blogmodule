<?php namespace Ooglee\Domain\Entities\Post\Type\Events;

use Ooglee\Domain\Entities\Post\Type\Contracts\IType;
use Ooglee\Domain\Entities\AEvent;
use Ooglee\Domain\Contracts\IEvent;

class TypeWasCreatedEvent extends AEvent implements IEvent
{
    /**
     * Domain Event, which our application might dispatch after a Category is created
     */
    
    /**
     *
     * @var Type 
     */
    public $type;

    /**
     * Create a new event instance.
     *
     * @param  Category 
     */
    public function __construct(IType $type)
    {
        $this->type = $type;
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