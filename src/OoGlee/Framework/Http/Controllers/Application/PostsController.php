<?php namespace Ooglee\Framework\Http\Controllers\Application;

use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Application\Entities\Post\PostResolver;
use Ooglee\Application\Entities\Post\Services\PostService;
use Ooglee\Domain\Entities\Post\Commands\ShowPostCommand;
use Ooglee\Domain\CommandBus\ICommandBus;

class PostsController extends Controller {

	// Our Command bus
    protected $bus;
    // Post service
    private $modelService;

    public function __construct(ICommandBus $bus, PostService $modelService)
    {
        $this->modelService = $modelService;
        $this->bus = $bus;
    }

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function getIndex()
    {   
        $response = $this->modelService->getAll();
        //return resources listing view
        return view(\OogleeBConfig::get('config.post_index.index'), compact('response'));
    }

     /**
    * Display the specified resource.
    *
    * @param Event $id
    * @return Response
    */
    public function getShow(PostResolver $resolver)
    {
        if (!$post = $resolver->resolve()) 
        {
            abort(404);
        }

        $command = new ShowPostCommand($post);

        try 
        {
            $this->bus->execute($command);
        }
        catch(\DomainException $e)
        {
            
        }

        return $post->getResponse();
        
    }
}
