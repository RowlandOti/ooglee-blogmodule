<?php namespace Ooglee\Application\Entities\Post\Category;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CategoryResolver --   - Resolution to identify the post item
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */
class CategoryResolver
{

    /**
     * The post repository
     *
     * @var ICategoryRepository
     */
    protected $repository;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    
    /**
     * Create a new CategoryResolver instance.
     *
     * @param ICategoryRepository    $repository
     * @param Request            $request
     */
    public function __construct(ICategoryRepository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request  = $request;
    }

    /**
     * Resolve the post.
     *
     * @return ICategory
     */
    public function resolve()
    {
       $url = $this->request->url();
       $tmp = explode('/', $url);
       $last_seg = end($tmp);

       return $this->repository->findBySlug($last_seg);
    }
}
