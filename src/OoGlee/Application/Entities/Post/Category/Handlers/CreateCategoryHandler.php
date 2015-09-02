<?php namespace Ooglee\Application\Entities\Category\Handlers;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Domain\Entities\Category;
use Ooglee\Domain\Entities\Category\ICategoryRepository;
use Ooglee\Domain\Entities\Category\Validators\CreateCategoryValidator;
use Ooglee\Domain\Contracts\IHashingService;
use Ooglee\Domain\CommandBus\ICommand;

class CreateCategoryHandler implements IHandler {

	/**
	 * CreateCategoryHandler implementation 
	 * 
	 */

     /**
     * @var Ooglee\Domain\Entities\Validators\CreateCategoryValidator
     */
    private $validator;

    /**
     * @var Ooglee\Domain\Entities\Category\ICategoryRepositoryInterface
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

    public function __construct(CreateCategoryValidator $validator, ICategoryRepository $repository, Dispatcher $dispatcher)
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
        $category = new Category;
        $category->title = $command->title;
        $category->slug = $command->slug;
        $category->main_image = $command->main_image;
        $category->main_image_alt = $command->main_image_alt;
        $category->you_tube_video_id = $command->you_tube_video_id;
        $category->summary = $command->summary;
        $category->content = $command->content;
        $category->is_sticky = $command->is_sticky;
        $category->meta_description = $command->meta_description;
        $category->meta_keywords = $command->meta_keywords;
        $category->status = $command->status;

        $this->repository->save($category);

        $this->dispatcher->dispatch($category->releaseEvents());
    }
}
