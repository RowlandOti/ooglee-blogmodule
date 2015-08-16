<?php

/**
 * Images configuration options
 */
return array(

	/**
	 * Default configurations for Post
	 *
	 */
	'post' => array(

		/**
		 * Whether the Main Image field is shown in the administrator config, and whether it's created for the seed
		 */
    	'posts_per_page' => 5,
    	/**
		 * The Post Model to use with our package
		 */
    	'post_model' => 'Entities\Post\Post',

    	'post_routes' => array(
	    	/**
			 * Base URI of the package's pages, e.g. "blog" in http://domain.com/blog and http://domain.com/blog/my-post
			 */
			'base_uri' => 'blog',
			/**
			 * Base URI of the package's pages, e.g. "blog" in http://domain.com/blog and http://domain.com/blog/my-post
			 */
			'base_uri_admin' => 'admin/blog',
			/**
			 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
			 * file then set this to false.
			 */
			'use_package_routes' => true
		)
	),
);