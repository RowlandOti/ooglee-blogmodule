<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

/**
 * Class PostContent --  
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
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new PostContent instance.
     *
     * @param Factory   $view
     * @param Decorator $decorator
     */
    public function __construct(Factory $view, Decorator $decorator)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
    }

    /**
     * Make the view content.
     *
     * @param PostInterface $p
     */
    public function make(IPost $post)
    {
        $post->setContent($this->view->make($post->getLayoutViewPath(), compact('post'))->render());
    }
}
