<?php 

namespace Services\Post;

use Repositories\Post\IPostRepository;
use Services\ABaseService;


/**
* Our PostService, containing all useful methods for business logic around Post
*/
class PostService extends ABaseService implements IPostService
{
    
    /**
    * Loads our $repository with the actual Repo associated with our IEventRepository
    * 
    * @param IPostRepository $postRepository
    *
    */
    public function __construct(IPostRepository $postRepository)
    {
        //$this->repository is inherited
        $this->repository = $postRepository;

        parent::__construct($postRepository);
    } 

}