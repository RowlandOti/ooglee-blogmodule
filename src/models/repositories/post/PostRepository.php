<?php  

 namespace Repositories\Post;

 use Eloquent;
 use Repositories\ABaseRepository;

 class PostRepository extends ABaseRepository implements IPostRepository {

  protected $modelClassInstance;

 	public function __construct(Eloquent $postModel)
    {
        $this->modelClassInstance = $postModel;

        parent::__construct($postModel);
    }

    public function getAll(array $related = null)
		{
      $posts = $this->modelClassInstance->orderBy('created_at', 'DESC')->paginate(20);
			
      return $posts;
		}
  }
