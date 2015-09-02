<?php namespace Ooglee\Domain\Entities\Post\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;

class ACategoryBaseModel extends Model implements ICategory {

	/**
	 * ACategoryBaseModel to be extended by Category Model.
	 * 
	 */
	
	/**
     * Return the post's path.
     *
     * @return string
     */
    public function path()
    {
        
    }

    /**
     * Get the id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
