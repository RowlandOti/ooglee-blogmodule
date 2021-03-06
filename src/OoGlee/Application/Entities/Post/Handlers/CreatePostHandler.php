<?php namespace Ooglee\Application\Entities\Post\Handlers;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Domain\Entities\Post;
use Ooglee\Domain\Entities\Post\IPostRepository;
use Ooglee\Domain\Entities\Post\Validators\CreatePostValidator;
use Ooglee\Domain\Contracts\IHashingService;
use Ooglee\Domain\CommandBus\ICommand;

class CreatePostHandler implements IHandler {

	/**
	 * CreatePostHandler implementation 
	 * 
	 */

     /**
     * @var Ooglee\Domain\Entities\Validators\CreatePostValidator
     */
    private $validator;

    /**
     * @var Ooglee\Domain\Entities\Post\IPostRepositoryInterface
     */
    private $repository;

    /**
     * @var Ooglee\Domain\Events\Dispatcher
     */
    private $dispatcher;

    /**
     * @var Oogle\Infrastructure\Hashing\IHashingService
     */
    private $hashingService;

    public function __construct(CreatePostValidator $validator, IPostRepository $repository, Dispatcher $dispatcher)
    {
        $this->validator = $validator;
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

	public function handle(ICommand $command)
    {
        $this->validate($command);
        $this->create($command);
    }

    protected function validate(ICommand $command)
    {
        $this->validator->validate($command);
    }

    protected function create(ICommand $command)
    {
        $post = new Post;
        $post->title = $command->title;
        $post->slug = $command->slug;
        $post->main_image = $command->main_image;
        $post->main_image_alt = $command->main_image_alt;
        $post->you_tube_video_id = $command->you_tube_video_id;
        $post->summary = $command->summary;
        $post->content = $command->content;
        $post->is_sticky = $command->is_sticky;
        $post->meta_description = $command->meta_description;
        $post->meta_keywords = $command->meta_keywords;
        $post->status = $command->status;

        $this->repository->save($post);

        $this->dispatcher->dispatch($post->releaseEvents());
    }
}
