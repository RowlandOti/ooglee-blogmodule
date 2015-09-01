<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Illuminate\View\Factory;

/**
 * Class PostContent --  -- Make Post contents in view
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class PostContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * Create a new PostContent instance.
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
     * @param PostInterface $p
     */
    public function make(IPost $post)
    {
        //$post->setContent($this->view->make($post->getLayoutViewPath(), compact('post'))->render());
        $post->setContent($this->view->make(\OogleeBConfig::get('config.post_view.view'), compact('post'))->render());
    }
}
