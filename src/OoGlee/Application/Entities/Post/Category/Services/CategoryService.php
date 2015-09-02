<?php namespace Ooglee\Application\Entities\Post\Category\Services;

use Helpers\Response\MyResponse;
use Ooglee\Application\Entities\ABaseService;
use Ooglee\Application\Entities\Post\Category\Services\ACategoryBaseService;
use Ooglee\Application\Entities\Post\Category\Services\ICategoryService;
use Ooglee\Domain\Entities\Category\Contracts\ICategoryRepository;

/**
* Our Service, containing all useful methods for business logic around Category
*/
class CategoryService extends ACategoryBaseService implements ICategoryService
{
    // Containing our repositoryClassInstance to make all our database calls to
    protected $repositoryClassInstance;
    
    /**
    * Loads our $repositoryClassInstance with the actual Repo associated with our IEventRepository
    * 
    * @param IEventRepository $eventRepository
    * 
    */
    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->repositoryClassInstance = $categoryRepository;

        parent::__construct($categoryRepository);
    } 

}