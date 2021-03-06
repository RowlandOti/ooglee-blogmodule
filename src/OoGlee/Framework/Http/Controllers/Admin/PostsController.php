<?php namespace Ooglee\Framework\Http\Controllers\Admin;

use Ooglee\Framework\Http\Controllers\Controller;
use Ooglee\Domain\CommandBus\ICommandBus;
use Ooglee\Domain\Validation\ValidationException;
use Ooglee\Domain\Entities\Post\Commands\CreatePostCommand;

class PostsController extends Controller {

    // Bus 
  	private $bus;
    // Blog configuration file
    private $config;


    public function __construct(ICommandBus $bus) 
    {
        $this->bus = $bus;
    }

   /**
   * Index all Resources
   * 
   * @return Redirect
   */
    public function getIndex()
    {
      //return resource listing view
      return view(\OogleeBConfig::get('config.post_index.index_admin'), compact(''));
    }

   /**
   * Create new Post 
   * 
   * @return Redirect
   */
    public function getCreate()
    {
      //return create resource view
      return view(\OogleeBConfig::get('config.post_create.view'), compact(''));
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
            return Redirect::to(\OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/create')->withErrors($e->getErrors());

        }
        catch(\DomainException $e)
        {
            return Redirect::to(\OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/create')->withErrors($e->getErrors());
        }

        return Redirect::to(\OogleeBConfig::get('config.post_routes.base_uri_admin').'/posts')->with(['message' => 'success!']);
    }

     /**
   * Edit Post
   * 
   * @return Redirect
   */
    public function getEdit($id)
    {
      //return create resource view
      return view(\OogleeBConfig::get('config.post_edit.view'), compact(''));
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
            return Redirect::to(\OogleeBConfig::get('laravelblog::routes.base_uri_admin').'/post/{$id}/edit')->withErrors($e->getErrors());
        }
        catch(\DomainException $e)
        {
            return Redirect::to(\OogleeBConfig::get('laravelblog::routes.base_uri_admin').'/post/{$id}/edit')->withErrors($e->getErrors());
        }

        return Redirect::to(\OogleeBConfig::get('laravelblog::routes.base_uri_admin').'/posts')->with(['message' => 'success!']);
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
