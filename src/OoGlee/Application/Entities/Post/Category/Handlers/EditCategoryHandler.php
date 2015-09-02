<?php namespace Ooglee\Application\Entities\Category\Handlers;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Domain\Entities\Category;
use Ooglee\Domain\Entities\Category\ICategoryRepositoryInterface;
use Ooglee\Domain\Entities\Category\Validators\CategoryValidator;
use Ooglee\Domain\Contracts\IHashingService;
use Ooglee\Domain\CommandBus\ICommand;

class EditCategoryHandler implements IHandler {

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

    public function __construct(CategoryValidator $validator, ICategoryRepository $repository, Dispatcher $dispatcher)
    {
        $this->validator = $validator;
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

	public function handle(ICommand $command)
    {
        $this->validate($command);
        $this->save($command);
    }

    protected function validate(ICommand $command)
    {
        $this->validator->validate($command);
    }

    protected function update(ICommand $command)
    {
        $category = $this->repository->findById($command->category_id);

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
