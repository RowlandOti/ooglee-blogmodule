<?php namespace Ooglee\Application\Entities\Post\Category;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Infrastructure\Presenter\Eloquent\EloquentPresenter;

/**
 * Class CategoryPresenter --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       rowland\ooglee-blog
 */
class CategoryPresenter extends EloquentPresenter
{

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The decorated category.
     *
     * @var ICategory
     */
    protected $entity;

    /**
     * Create a new CategoryPresenter instance.
     *
     * @param ICategory                  $entity
     */
    public function __construct(IPost $entity)
    {
        $this->entity  = $entity;
    }

    /**
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return \Html::link($this->entity->path(), $this->entity->getTitle(), ['target' => '_blank']);
    }
}
