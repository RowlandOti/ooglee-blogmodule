<?php namespace Ooglee\Domain\Entities\Post\Category\Commands;

use Ooglee\Domain\Entities\ACommand;
use Ooglee\Domain\CommandBus\ICommand;
use Ooglee\Domain\Contracts\IRequest;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;

/**
 * Class ShowCategoryCommand -- Defines that our application can 
 * create a category. This functions like a Data Transfer Object (DTO)
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowCategoryCommand extends ACommand implements ICommand {

	/**
     * @var string
     */
    protected $category;

    public function __construct(ICategory $category)
    {
        $this->category = $category;
    }
}
