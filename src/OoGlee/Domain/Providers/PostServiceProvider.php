<?php namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\Entities\Post\Repositories\PostEloquentRepository;
use Ooglee\Domain\Entities\Post\Post;

/**
* Register our Repository with Laravel
*/
class PostServiceProvider extends ServiceProvider {

  /**
    * Registers the service in the IoC Container
    * 
    */
	 public function register() 
   {
	 	  // Bind the returned class to the namespace 'Ooglee\Domain\Entities\Post\Contracts\IPostRepository'
  		$this->app->bind('Ooglee\Domain\Entities\Post\Contracts\IPostRepository', function($app)
      {
          return new PostEloquentRepository(new Post());
          //$model = $this->app['config']['ooglee-blog.post.post_model'];
    			//$model = \Config::get('ooglee-blog.post.post_model');
          //var_dump(new PostEloquentRepository(new $model()));
        	//return new PostEloquentRepository(new $model);
      });

  	}

  }