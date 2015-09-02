<?php namespace Ooglee\Domain\Entities\Post\Type\Contracts;

use Ooglee\Domain\Contracts\IBaseRepository;

interface ITypeRepository extends IBaseRepository {

    	/**
     *  In case of more Model specific implementations 
     *  define them in this interface
     */

    	 /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return null|IPost
     */
    public function findBySlug($slug);

    /**
     * Find a post by it's string ID.
     *
     * @param $id
     * @return null|PostInterface
     */
    public function findById($id);

    /**
     * Get recent posts.
     *
     * @param null $limit
     * @return EntryCollection
     */
    public function getRecent($limit = null);
}