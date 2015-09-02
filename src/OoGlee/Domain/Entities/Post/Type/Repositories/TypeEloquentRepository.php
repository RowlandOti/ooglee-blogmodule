<?php namespace Ooglee\Domain\Entities\Post\Type\Repositories;

use Ooglee\Domain\Entities\Post\Type\Contracts\IType;
use Ooglee\Domain\Entities\Post\Type\Contracts\ITypeRepository;
use Ooglee\Domain\Entities\Post\Type\ATypeEloquentRepository;

 class TypeEloquentRepository extends ATypeEloquentRepository implements ITypeRepository {

  	protected $modelClassInstance;

 	public function __construct(IType $model)
    {
        $this->modelClassInstance = $model;

        parent::__construct($model);
    }
}
