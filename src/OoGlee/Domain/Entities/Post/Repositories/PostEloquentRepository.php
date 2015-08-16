<?php namespace Ooglee\Domain\Entities\Post\Repositories;

use Ooglee\Domain\Entities\Post\Contracts\IPost;
use Ooglee\Domain\Entities\Post\Contracts\IPostRepository;
use Ooglee\Domain\Entities\ABaseEloquentRepository;

 class PostEloquentRepository extends APostEloquentRepository implements IPostRepository {

  	protected $modelClassInstance;

 	public function __construct(IPost $model)
    {
        $this->modelClassInstance = $model;

        parent::__construct($model);
    }
}
