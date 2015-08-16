<? php Ooglee\Framework\Http\Application\Controllers

use Ooglee\Framework\Http\Controllers;
use Ooglee\Application\Entities\Post\PostService;

class PostsController extends Controller {

	protected $modelService;

    public function __construct(PostService $modelService)
    {
        $this->modelService = $modelService;
    }

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
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
    public function show($id)
    {
        $response = $this->modelService->getBy($id);

        return view('post.view', compact('response'));
        
    }
}
