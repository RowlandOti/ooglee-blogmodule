<?php  namespace Ooglee\Domain\Entities\Post

use Illuminate\Database\Eloquent\Model;

class Category extends ABaseModel {

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