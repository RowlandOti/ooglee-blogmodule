<?php namespace Ooglee\Domain\Entities\Post\Commands;

use Ooglee\Domain\Entities\ACommand;
use Ooglee\Domain\CommandBus\ICommand;
use Ooglee\Domain\Contracts\IRequest;
use Ooglee\Domain\Entities\Post\Contracts\IPost;

/**
 * Class CreatePostCommand -- Defines that our application can 
 * create a post. This functions like a Data Transfer Object (DTO)
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowPostCommand extends ACommand implements ICommand {

	/**
     * @var string
     */
    protected $post;

    public function __construct(IPost $post)
    {
        $this->post = $post;
    }
}
