<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Infrastructure\View\ViewTemplate;

/**
 * Class PostLoader --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class PostLoader
{

    /**
     * The template data.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new PostLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load post data to the template.
     *
     * @param PostInterface $post
     */
    public function load(IPost $post)
    {
        $this->template->set('title', $post->getTitle());
        $this->template->set('meta_title', $post->metaTitle());
        $this->template->set('meta_keywords', $post->metaKeywords());
        $this->template->set('meta_description', $post->metaDescription());
    }
}
