<?php namespace Ooglee\Domain\Entities\Post;

use DomainException;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Ooglee\Domain\Events\EventableTrait;
use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Domain\Entities\Post\PostBaseModel;
use Ooglee\Domain\Contracts\IAggregateRoot;

class Post extends PostBaseModel implements IAggregateRoot, IPost {

	use EventableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tb_blog_post';

  /**
   * Tell Database these are Dates
   *
   * @var array
   */
	protected $dates = ['published_at','deleted_at'];
  
  /**
   * Defines the belongsToMany relationship between Post and Category
   * This Post belongs to many categories
   *
   * @return mixed
   */
  public function category()
  {
    // Arguments (1) the model name, (2) the pivot table name, (3) the local key and (4) the foreign key.
    return $this->belongsTo('Ooglee\Domain\Entities\Post\Category\Category');
  }

  /**
   * Assign Category to Post
   * @param Category $category
   * @return $this
   */
  public function setCategory(ICategory $category)
  {
      $this->category()->associate($category);

      return $this;
  }

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if(!$this->exists) 
    {
      $this->attributes['slug'] = str_slug($value);
    }
	}

  /**
   * Save Post, ensuring a Category
   * is assigned
   * @param array $options
   * @return bool|void
   * @throws \DomainException
   */
  public function save(array $options = array())
  {
      // Do some testing before passing onto parent save method
      //if($this->category === null || $this->category->exists === false)
      //{
          //throw new DomainException('Post must be assigned a Category');
      //}

      if(!$this->exists)
      {
        $this->recordEvent(new PostWasCreatedEvent($this));
      }

      $saved = parent::save($options);

      return $saved;
  }
}
