<?php namespace Ooglee\Domain\Entities\Post\Category\Contracts;


use Illuminate\Http\Response;

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
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory();

   
    /**
     * Get the path to the post's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath();

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response);
}
