<?php namespace Ooglee\Domain\Entities\Post\Commands;

use Ooglee\Domain\Entities\ACommand;
use Ooglee\Domain\CommandBus\ICommand;
use Ooglee\Domain\Entities\Post\Contracts\IPost;



/**
 * Class GetPostPathCommand
 *
 * @link          http://skyllabler.com/ooglee-blog
 * @author        AnomalyLabs, Inc. <coder@skyllabler.com>
 * @author        Ryan Thompson <rowland@skyllabler.com>
 * @package       rowland\ooglee-blog
 */
class GetPostPathCommand extends ACommand implements ICommand
{

    /**
     * The post instance.
     *
     * @var IPost
     */
    protected $post;

    /**
     * Return the path for a post.
     *
     * @param IPost $post
     */
    public function __construct(IPost $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the command.
     *
     * @return string
     */
    public function handle()
    {
        $data = [
            'year'  => $this->post->created_at->format('Y'),
            'month' => $this->post->created_at->format('m'),
            'day'   => $this->post->created_at->format('d'),
            'post'  => $this->post->getSlug()
        ];

        return URL::route('post', $data);
    }
}
