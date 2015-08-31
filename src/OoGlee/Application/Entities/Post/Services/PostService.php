<?php namespace Ooglee\Application\Entities\Post\Services;

use Helpers\Response\MyResponse;
use Ooglee\Application\Entities\ABaseService;
use Ooglee\Application\Entities\Post\Services\APostBaseService;
use Ooglee\Application\Entities\Post\Services\IPostService;
use Ooglee\Domain\Entities\Post\Contracts\IPostRepository;

/**
* Our Service, containing all useful methods for business logic around Post
*/
class PostService extends APostBaseService implements IPostService
{
    // Containing our repositoryClassInstance to make all our database calls to
    protected $repositoryClassInstance;
    
    /**
    * Loads our $repositoryClassInstance with the actual Repo associated with our IEventRepository
    * 
    * @param IEventRepository $eventRepository
    * 
    */
    public function __construct(IPostRepository $postRepository)
    {
        $this->repositoryClassInstance = $postRepository;

        parent::__construct($postRepository);
    } 

}