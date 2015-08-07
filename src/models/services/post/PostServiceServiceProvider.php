<?php 

namespace Services\Post;

use Illuminate\Support\ServiceProvider;
use Repositories\Post\PostRepository;
use Entities\Post\Post;
use Services\Post\PostService;


/**
* Register our eventservice service with Laravel
*/
class PostServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace 'Services\Post\IPostService'
        $this->app->bind('Services\Post\IPostService', function($app)
        {
            return new PostService(new PostRepository(new Post()));
        });

    }
}