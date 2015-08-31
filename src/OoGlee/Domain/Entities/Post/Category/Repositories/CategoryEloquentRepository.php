<?php namespace Ooglee\Domain\Entities\Post\Category\Repositories;

use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategoryRepository;
use Ooglee\Domain\Entities\Post\Category\ACategoryEloquentRepository;

 class CategoryEloquentRepository extends ACategoryEloquentRepository implements ICategoryRepository {

  	protected $modelClassInstance;

 	public function __construct(ICategory $model)
    {
        $this->modelClassInstance = $model;

        parent::__construct($model);
    }
}
