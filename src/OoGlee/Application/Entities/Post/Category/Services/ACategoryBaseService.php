<?php namespace Ooglee\Application\Entities\Post\Category\Services;

use Ooglee\Domain\Entities\ABaseRepository;
use Ooglee\Domain\Contracts\IBaseService;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategoryRepository;

//Each service class would extend a ACategoryBaseService class which 
//implements the following interface:

abstract class  ACategoryBaseService implements IBaseService {

    protected $repository;

    public function __construct(ICategoryRepository $repository)
    {
      $this->repository = $repository;
    }

    public function getAll() 
    {
      $response = $this->repository->getAll();

      return $response;
    }

    /**
     * Get recent category.
     * @param null  $limit
     * @return CategoryCollection
     */
    public function getRecent($limit = null)
    {
        $related = $this->repository->getRecent();

        return $related;
    }
    /**
     * Get sticky category.
     * @param null  $limit
     * @return CategoryCollection
     */
    public function getSticky($limit = null)
    {
        $related = $this->repository->getSticky();

        return $related;
    }
    public function getBy($id) 
    {
      // If entity variable is numeric, assume ID
        if (is_numeric($id))
        {
            // Get Eloquent model based on ID
            $modelClassInstance = $this->repository->findById($id);
        }
        else 
        {
            // Since not numeric, lets try get the Eloquent model based on Name
            $modelClassInstance = $this->repository->findBySlug($id);
        }
        
        // If Eloquent model returned (rather than null) return the model
        if ($modelClassInstance != null)
        {
            $response = $modelClassInstance;

            return $response;
        }

    } 
}