<?php namespace Ooglee\Domain\Entities\Post\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Ooglee\Domain\Entities\Post\Category\Contracts\ICategory;

class ACategoryBaseModel extends Model implements ICategory {

	/**
	 * ACategoryBaseModel to be extended by Category Model.
	 * 
	 */

	/**
     * The posts's content.
     *
     * @var null|string
     */
    protected $content = null;

    /**
     * The post's response.
     *
     * @var null|Response
     */
    protected $response = null;
	
	/**
     * Return the post's path.
     *
     * @return string
     */
    public function path()
    {
        //return $this->dispatch(new GetCategoryPath($this));
    }

    

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the path to the post's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath()
    {
        $type = $this->getType();

        /* @var EditorFieldType $layout */
        $layout = $type->getFieldType('layout');

        return $layout->getViewPath();
    }

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}
