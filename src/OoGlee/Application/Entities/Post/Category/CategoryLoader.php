<?php namespace Ooglee\Application\Entities\Post\Category;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Infrastructure\View\ViewTemplate;

/**
 * Class CategoryLoader --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class CategoryLoader
{

    /**
     * The template data -- -- Loading category data
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new CategoryLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load category data to the template.
     *
     * @param ICategory $category
     */
    public function load(ICategory $category)
    {
        $this->template->set('title', $category->getTitle());
        $this->template->set('meta_title', $category->metaTitle());
        $this->template->set('meta_keywords', $category->metaKeywords());
        $this->template->set('meta_description', $category->metaDescription());
    }
}
