<?php namespace Oogle\Domain\Repositories\User;

use Oogle\Domain\Contracts\IBaseRepository;

interface IPostRepository extends IBaseRepository {

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
     * Find many posts by category.
     *
     * @param ICategory $category
     * @param null      $limit
     * @return EntryCollection
     */
    public function findManyByCategory(ICategory $category, $limit = null);

    /**
     * Get recent posts.
     *
     * @param null $limit
     * @return EntryCollection
     */
    public function getRecent($limit = null);

    /**
     * Get featured posts.
     *
     * @param null $limit
     * @return EntryCollection
     */
    public function getSticky($limit = null);
}