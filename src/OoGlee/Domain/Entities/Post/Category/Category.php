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
        // Arguments (1) the model name, (2) the pivot table name, (3) the local key and (4) the foreign key.
        return $this->hasMany('Ooglee\Domain\Entities\Post\Post', 'category_id');
    }

    public function __toString()
    {
        return $this->category;
    }
} 