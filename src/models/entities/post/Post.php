<?php namespace Rowland\LaravelBlog;

namespace Entities\Post;

use Entities\BaseModel;
use Extentions\PostCollection;

class Post extends BaseModel {
    
    //Now, if we use Post::all()->foo() then it’ll call the method in our PostCollection 
    //because we have returned our PostCollection class which contains this method. 
    //This way we can add our custom methods and can apply those methods on any Eloquent collection object.
	public function newCollection(array $models = array())
    {
        return new PostCollection($models);
    }

}
