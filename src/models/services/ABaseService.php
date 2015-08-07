<?php 

    namespace Services;

    use Repositories\ABaseRepository;
    use Validator;

  //Each service class would extend a ABaseService class which 
 //implements the following interface:

  abstract class  ABaseService implements IBaseService {

    protected $repository;

    public function __construct(ABaseRepository $repository)
    {
      $this->repository = $repository;
    }

    public function getAll() 
    {
      $response = $this->repository->getAll();

      return $response;
    }
    
     
  }