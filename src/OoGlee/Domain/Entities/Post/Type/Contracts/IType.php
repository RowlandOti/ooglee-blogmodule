<?php namespace Ooglee\Domain\Entities\Post\Type\Contracts;


use Illuminate\Http\Response;

/**
 * Interface IType
 *
 * @link          http://skyllabler.com/product/ooglee/module/ooglee-blog
 * @author        Skyllabler, Inc. <coder@skyllabler.com>
 * @author        Otieno Rowland <rowlandmtetezi@skyllabler.com>
 * @package       Oogle\PostsModule
 */
interface IType
{

    /**
     * Return the post's path.
     *
     * @return string
     */
    public function path();

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
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the CSS path.
     *
     * @return string
     */
    public function getCssPath();

    /**
     * Get the JS path.
     *
     * @return string
     */
    public function getJsPath();
}
