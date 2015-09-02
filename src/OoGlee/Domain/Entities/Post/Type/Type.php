<?php  namespace Ooglee\Domain\Entities\Post\Type;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Entities\Post\Type\Contracts\IType;
use Ooglee\Domain\Entities\Post\Type\ATypeBaseModel;

class Type extends ATypeBaseModel implements IType {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_blog_type';

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
        return $this->type;
    }
} 