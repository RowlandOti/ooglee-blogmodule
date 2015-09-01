<?php namespace Ooglee\Application\Entities\Post;

use \App;
use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Infrastructure\Config\OogleeBlogConfig;
use Ooglee\Infrastructure\Presenter\Eloquent\EloquentPresenter;

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
    protected $entity;

    /**
     * The config.
     *
     * @var OogleeBlogConfig
     */
    protected $config;

    /**
     * Create a new PostPresenter instance.
     *
     * @param HtmlBuilder                $html
     * @param SettingRepositoryInterface $settings
     * @param IPost                      $entity
     */
    public function __construct(IPost $entity)
    {
        $this->entity   = $entity;
        $this->html     = App::make('html');
        $this->config   = App::make('Ooglee\Infrastructure\Config\OogleeBlogConfig');
    }

    /**
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return $this->html->link($this->entity->path(), $this->entity->getTitle(), ['target' => '_blank']);
    }
}
