<?php namespace Ooglee\Domain\Entities\Post\Type\Commands;

use Ooglee\Domain\Entities\ACommand;
use Ooglee\Domain\CommandBus\ICommand;
use Ooglee\Domain\Contracts\IRequest;
use Ooglee\Domain\Entities\Post\Type\Contracts\IType;

/**
 * Class ShowTypeCommand -- Defines that our application can 
 * create a post. This functions like a Data Transfer Object (DTO)
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowTypeCommand extends ACommand implements ICommand {

	/**
     * @var string
     */
    protected $post;

    public function __construct(IType $post)
    {
        $this->post = $post;
    }
}
