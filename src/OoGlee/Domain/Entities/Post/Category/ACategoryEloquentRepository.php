<?php namespace Ooglee\Domain\Entities\Post\Category;

use Eloquent;
use Ooglee\Domain\Contracts\IBaseRepository;
 
abstract class ACategoryEloquentRepository implements IBaseRepository {

	/**
	* The Abstract ABaseRepository provides default implementations of the methods defined
	* in the IBaseRepository interface. These simply delegate static function calls
	* to the right eloquent model based on the $modelClassName.
	*/

	protected $modelClassInstance;

	public function __construct(ICategory $modelClassInstance)
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

    public function save(Eloquent $modelClassInstance)
    {
        return $modelClassInstance->save();
    }
}