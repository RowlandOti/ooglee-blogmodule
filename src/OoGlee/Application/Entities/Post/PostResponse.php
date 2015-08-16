<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Illuminate\Routing\ResponseFactory;

/**
 * Class PostContent --  
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
     * Create a new PostResponse instance.
     *
     * @param ResponseFactory $response
     */
    function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * Make the post response.
     *
     * @param PostInterface $post
     */
    public function make(IPost $post)
    {
        $post->setResponse($this->response->view('admin.posts.view', compact('post')));
    }
}
