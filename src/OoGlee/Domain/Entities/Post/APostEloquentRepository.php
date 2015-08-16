<?php namespace Oogle\Domain\Entities\Post;

use Eloquent;
use Oogle\Domain\Contracts\IBaseRepository;
 
abstract class APostEloquentRepository implements IBaseRepository {

	/**
	* The Abstract ABaseRepository provides default implementations of the methods defined
	* in the IBaseRepository interface. These simply delegate static function calls
	* to the right eloquent model based on the $modelClassName.
	*/

	protected $modelClassInstance;

	public function __construct(IPost $modelClassInstance)
	{
		$this->modelClassInstance = $modelClassInstance;
    }

	public function findById($id)
	{
		$related = $this->modelClassInstance->where('id', $id)->first();

        return $related;
	}
	public function findBySlug($slug)
	{
		$related = $this->modelClassInstance->orderBy('created_at', 'DESC')->where('slug', $slug)->first();

        return $related;
	}

	/**
     * Find many posts by category.
     *
     * @param ICategory $category
     * @param null  $limit
     * @return EntryCollection
     */
    public function findManyByCategory(ICategory $category, $limit = null)
    {
        $related = $this->modelClassInstance->active()->where('category_id', $category->getId())->paginate($limit);

        return $related;
    }

    /**
     * Get where posts.
     * @param null  $limit
     * @return EntryCollection
     */
	public function getWhere($column, $value, $limit = null)
	{
        $related = $this->modelClassInstance->where($column, '=', $value);

        return $related;
    }

    /**
     * Get recent posts.
     * @param null  $limit
     * @return EntryCollection
     */
    public function getRecent($limit = null)
    {
        $related = $this->modelClassInstance->active()->paginate($limit);

        return $related;
    }

    /**
     * Get sticky posts.
     * @param null  $limit
     * @return EntryCollection
     */
    public function getSticky($limit = null)
    {
        $related = $this->modelClassInstance->active()->where('is_sticky', true)->paginate($limit);

        return $related;
    }

    public function save(Eloquent $modelClassInstance)
    {
        return $modelClassInstance->save();
    }
}