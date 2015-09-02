<?php namespace Ooglee\Application\Entities\Post\Category;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Illuminate\Routing\ResponseFactory;

/**
 * Class CategoryContent --  -- Make CategoryResponse
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class PostResponse
{

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $container;

    /**
     * Create a new CategoryResponse instance.
     *
     * @param ResponseFactory $response
     */
    function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * Make the category response.
     *
     * @param ICategory $category
     */
    public function make(ICategory $category)
    {
        //$category->setResponse($this->response->view('admin.categorys.view', compact('category')));
        $category->setResponse($this->response->view(\OogleeBConfig::get('config.category_view.view'), compact('category')));
    }
}
