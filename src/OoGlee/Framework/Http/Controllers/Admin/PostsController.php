<?php Ooglee\Framework\Http\Controllers\Admin

use Ooglee\Framework\Http\Controllers;
use Ooglee\Domain\CommandBus\ICommandBus;
use Ooglee\Domain\Validation\ValidationException;
use Ooglee\Domain\Entities\Post\Commands\CreatePostCommand;

class PostsController extends Controller {

	private $bus;

    public function __construct(ICommandBus $bus) 
    {
        $this->bus = $bus;
    }

    /**
   * Create Post
   * 
   * @return Redirect
   */
    public function getIndex()
    {
       return view('admin.post.index',compact(''));
    }

    /**
   * Create Post
   * 
   * @return Redirect
   */
    public function getCreate()
    {
       return view('admin.post.create',compact(''));
    }

   /**
   * Create new Post
   * 
   * @return Redirect
   */
    public function postCreate(PostRequest $request)
    {
        $command = new CreatePostCommand($request->all());

        try 
        {
            $this->bus->execute($command);
        }
        catch(ValidationException $e)
        {
            return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/post/create')->withErrors($e->getErrors());
        }
        catch(\DomainException $e)
        {
            return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/post/create')->withErrors($e->getErrors());
        }

        return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/posts')->with(['message' => 'success!']);
    }

     /**
   * Edit Post
   * 
   * @return Redirect
   */
    public function getEdit($id)
    {
       return view('admin.post.edit',compact(''));
    }

   /**
   * Edit Post
   * 
   * @return Redirect
   */
    public function postEdit(PostRequest $request, $id)
    {
        $command = new EditPostCommand($request->all());

        try 
        {
            $this->bus->execute($command);
        }
        catch(ValidationException $e)
        {
            return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/post/{$id}/edit')->withErrors($e->getErrors());
        }
        catch(\DomainException $e)
        {
            return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/post/{$id}/edit')->withErrors($e->getErrors());
        }

        return Redirect::to(Config::get('laravelblog::routes.base_uri_admin').'/posts')->with(['message' => 'success!']);
    }

   /**
   * Delete Post
   * 
   * @return Redirect
   */
    public function postDelete()
    {

    }
}
