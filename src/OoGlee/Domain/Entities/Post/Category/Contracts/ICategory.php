<?php namespace Ooglee\Domain\Entities\Post\Category\Contracts;

/**
 * Interface IPost
 *
 * @link          http://skyllabler.com/product/ooglee/module/ooglee-blog
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Oogle\PostsModule
 */
interface ICategory
{

    /**
     * Return the post's path.
     *
     * @return string
     */
    public function path();

    /**
     * Get the ID.
     *
     * @return integer
     */
    public function getId();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts();

}
