<?php namespace Ooglee\Application\Entities\Post\Handlers;

use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Application\Entities\Post\PostLoader;
use Ooglee\Application\Entities\Post\PostContent;
use Ooglee\Application\Entities\Post\PostResponse;
use Ooglee\Domain\CommandBus\ICommand;

/**
 * Class ShowPostHandler --  
 * 
 * 
 * @link          http://skyllabler.com/ooglee
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Ooglee\PostModule
 */

class ShowPostHandler implements IHandler {

	/**
	 * ShowPostHandler implementation 
	 * 
	 */

    /**
     * @var Ooglee\Domain\Events\Dispatcher
     */
    private $dispatcher;

    /**
     * @var Ooglee\Domain\Events\Dispatcher
     */
    private $loader;

    /**
     * @var Ooglee\Domain\Events\Dispatcher
     */
    private $content;

    /**
     * @var Ooglee\Domain\Events\Dispatcher
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
    public function __construct(Dispatcher $dispatcher, PostLoader $loader,PostContent $content,PostResponse $response)
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
        $loader->load($command->post);
        $content->make($command->post);
        $response->make($command->post);

        $this->dispatcher->dispatch($post->releaseEvents());
    }
}
