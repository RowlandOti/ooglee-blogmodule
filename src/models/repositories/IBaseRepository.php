<?php 

    namespace Repositories;
  //Each repository class would extend a BaseRepository class which 
 //implements the following interface:
 
  interface IBaseRepository {

  	public function getAll(array $related = null);
  	public function getById($id, array $related = null);
  	public function getWhere($column, $value, array $related = null);
    public function getRecent($limit, array $related = null);

  }