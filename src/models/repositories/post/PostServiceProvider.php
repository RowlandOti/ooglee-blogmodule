<?php  

namespace Repositories\Post;

use Illuminate\Support\ServiceProvider;
use Repositories\Post\PostRepository;
use Entities\Post\Post;

/**
* Register our Repository with Laravel
*/
class PostServiceProvider extends ServiceProvider {

	 public function register() {

	 	// Bind the returned class to the namespace 'Repository\Post\IPostRepository'
  		$this->app->bind('Repositories\Post\IPostRepository', function($app)
        {
            return new PostRepository(new Post());
        });

  	}

  }