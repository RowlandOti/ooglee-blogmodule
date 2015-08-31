<?php namespace Ooglee\Framework\Http\Controllers\Application;

use Ooglee\Infrastructure\Config\OogleeBlogConfig;
use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Application\Entities\Post\Services\PostService;

class PostsController extends Controller {
    
    // Post service
	private $modelService;
    // Blog configuration file
    private $config;

    public function __construct(PostService $modelService, OogleeBlogConfig $config)
    {
        $this->modelService = $modelService;
        $this->config = $config;
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
        return view($this->config->get('config.post_index.index'), compact('response'));
    }

     /**
    * Display the specified resource.
    *
    * @param Event $id
    * @return Response
    */
    public function show($id)
    {
        $response = $this->modelService->getBy($id);

        //return resource listing view
        return view($this->config->get('config.post_view.view'), compact('response'));
        
    }
}
