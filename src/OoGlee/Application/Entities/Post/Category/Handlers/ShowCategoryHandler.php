<?php namespace Ooglee\Application\Entities\Category\Handlers;

use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Application\Entities\Category\CategoryLoader;
use Ooglee\Application\Entities\Category\CategoryContent;
use Ooglee\Application\Entities\Category\CategoryResponse;
use Ooglee\Domain\CommandBus\ICommand;
use Illuminate\Bus\Dispatcher;

/**
 * Class ShowCategoryHandler --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowCategoryHandler implements IHandler {

	/**
	 * ShowPostHandler implementation 
	 * 
	 */

    /**
     * @var Dispatcher $dispatcher
     */
    private $dispatcher;

    /**
     * @var PostLoader $loader
     */
    private $loader;

    /**
     * @var PostContent $content
     */
    private $content;

    /**
     * @var PostResponse $response
     */
    private $response;

     /**
     * Handle the command
     *
     * @param Dispatcher     $dispatcher
     * @param PostLoader     $loader
     * @param PostContent    $content
     * @param PostResponse   $response
     * 
     */
    public function __construct(Dispatcher $dispatcher, CategoryLoader $loader, CategoryContent $content, CategoryResponse $response)
    {
        $this->dispatcher = $dispatcher;
        $this->loader = $loader;
        $this->content = $content;
        $this->response = $response;
    }

	public function handle(ICommand $command)
    {
        $this->show($command);
    }

    protected function show(ICommand $command)
    {   
        $this->loader->load($command->category);
        $this->content->make($command->category);
        $this->response->make($command->category);

        //$this->dispatcher->dispatch($command->category->releaseEvents());
    }
}
