<?php  namespace Ooglee\Domain\Entities\User\Validators;

use Illuminate\Validation\Factory;
use Ooglee\Domain\Validation\ValidationException;
use Ooglee\Domain\Validation\ValidatorInterface;
use Ooglee\Domain\CommandBus\ICommand;

class PostValidator implements ValidatorInterface {

    /**
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    /**
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:255|unique:post',
        'slug' => 'required|max:10|unique:post',
        'main_image' => 'required',
        'summary' => 'required|max:20',
        'content' => 'required|min:50',
    ];

    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Ooglee\Domain\CommandBus\ICommand
     * @throws Ooglee\Domain\Validation\ValidationException
     */
    public function validate(ICommand $command)
    {
        $validator = $this->validator->make([
            'title' => $command->title,
            'slug' => $command->slug,
            'main_image' => $command->main_image,
            'summary' => $command->summary,
            'content' => $command->content,
        ], $this->rules);

        if(!$validator->passes())
        {
            throw new ValidationException($validator->errors());
        }
    }
}