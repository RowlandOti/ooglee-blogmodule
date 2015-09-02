<?php namespace Ooglee\Application\Entities\Post\Category;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Illuminate\View\Factory;

/**
 * Class CategoryContent --  -- Make Category contents in view
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class CategoryContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * Create a new CategoryContent instance.
     *
     * @param Factory   $view
     * @param Decorator $decorator
     */
    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    /**
     * Make the view content.
     *
     * @param ICategory $category
     */
    public function make(ICategory $category)
    {
        //$category->setContent($this->view->make($category->getLayoutViewPath(), compact('category'))->render());
        $category->setContent($this->view->make(\OogleeBConfig::get('config.category_view.view'), compact('category'))->render());
    }
}
