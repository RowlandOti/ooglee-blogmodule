<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Domain\Entities\Post\Contracts\IPostRepository;
use Illuminate\Http\Request;

/**
 * Class PostResolver --   - Resolution to identify the post item
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */
class PostResolver
{

    /**
     * The post repository
     *
     * @var IPostRepository
     */
    protected $repository;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    
    /**
     * Create a new PostResolver instance.
     *
     * @param IPostRepository    $repository
     * @param Request            $request
     */
    public function __construct(IPostRepository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request  = $request;
    }

    /**
     * Resolve the post.
     *
     * @return PostInterface|null
     */
    public function resolve()
    {
       $url = $this->request->url();
       $tmp = explode('/', $url);
       $last_seg = end($tmp);

       return $this->repository->findBySlug($last_seg);
    }
}
