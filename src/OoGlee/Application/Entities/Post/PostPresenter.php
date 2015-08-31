<?php namespace Ooglee\Application\Entities\Post;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Infrastructure\Config\OogleeBlogConfig;
use Ooglee\Application\Entities\Eloquent\EloquentPresenter;
use Collective\Html\HtmlBuilder;

/**
 * Class PostPresenter --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       rowland\ooglee-blog
 */
class PostPresenter extends EloquentPresenter
{

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The decorated post.
     *
     * @var IPost
     */
    protected $object;

    /**
     * The config.
     *
     * @var OogleeBlogConfig
     */
    private $config;

    /**
     * Create a new PostPresenter instance.
     *
     * @param HtmlBuilder                $html
     * @param SettingRepositoryInterface $settings
     * @param                            $object
     */
    public function __construct(HtmlBuilder $html, OogleeBlogConfig $config, IPost $object)
    {
        $this->html     = $html;
        $this->config   = $config;

        parent::__construct($object);
    }

    /**
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return $this->html->link($this->object->path(), $this->object->getTitle(), ['target' => '_blank']);
    }
}
