<? php Ooglee\Framework\Http\Controllers

use Ooglee\Framework\Http\Controllers;
use Ooglee\Application\Entities\Post\PostService;

class PostsController extends Controller {

	protected $modelService;
    protected $bus;

    public function __construct(ICommandBus $bus, PostService $modelService)
    {
        $this->modelService = $modelService;
        $this->bus = $bus;
    }

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function getIndex()
    {   
        $response = $this->modelService->getAll();

        return view('post.index', compact('response'));
    }

     /**
    * Display the specified resource.
    *
    * @param Event $id
    * @return Response
    */
    public function getShow(PostResolver $resolver)
    {
        if (!$post = $resolver->resolve()) 
        {
            abort(404);
        }

        $command = new ShowPostCommand($post);

        try 
        {
            $this->bus->execute($command);
        }
        catch(\DomainException $e)
        {
            
        }

        return $post->getResponse();
        
    }
}
