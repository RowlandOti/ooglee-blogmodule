<?php namespace Ooglee\Infrastructure\Config\Facades;

use Illuminate\Support\Facades\Facade;

class OogleeBlogConfigFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() 
	{ 
		return 'ooglee-blog.config'; 
	}

}
