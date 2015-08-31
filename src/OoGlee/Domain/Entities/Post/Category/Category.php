<?php  namespace Ooglee\Domain\Entities\Post\Category;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Domain\Entities\Post\Category\ACategoryBaseModel;

class Category extends ACategoryBaseModel implements ICategory {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_blog_category';

    /**
    * Tell Database these are Dates
    *
    * @var array
    */
    protected $dates = ['published_at','deleted_at'];
	/**
     * Defines the hasMany relationship between Post and Category
     * This category can have many posts
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany('Ooglee\Domain\Entities\Post\Post');
    }

    public function __toString()
    {
        return $this->category;
    }
} 