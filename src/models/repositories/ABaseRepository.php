<?php 

 namespace Repositories;

 use Eloquent;
 
/**
* The Abstract ABaseRepository provides default implementations of the methods defined
* in the IBaseRepository interface. These simply delegate static function calls
* to the right eloquent model based on the $modelClassName.
*/
 
abstract class ABaseRepository implements IBaseRepository {

		protected $modelClassInstance;

		public function __construct(Eloquent $modelClassInstance)
		{
			$this->modelClassInstance = $modelClassInstance;
        }

		public function getAll(array $related = null)
		{
			$related = $this->modelClassInstance->all();

            return $related;
		}

		public function getById($id, array $related = null)
		{
			$related = $this->modelClassInstance->find($id);

            return $related;
		}

		public function getWhere($column, $value, array $related = null)
		{

            $related = $this->modelClassInstance->where($column, '=', $value);

            return $related;
        }

        public function getRecent($limit, array $related = null)
        {

        }

		

	}