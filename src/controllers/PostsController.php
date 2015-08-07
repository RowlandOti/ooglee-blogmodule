<?php 

namespace Rowland\LaravelBlog;

use Services\Post\IPostService;
use ApiBaseController;
use View;

class PostsController extends ApiBaseController {

	public function __construct(IPostService $postService)
    {
        $this->modelService = $postService;

        parent::__construct($postService);
    }

	/**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {   
        $posts = parent::index();

    	//return View::make(\Config::get('laravelblog::views.index_page.view'))->with('posts', $posts);
        
        return var_dump($posts);
    }
}
