<?php

/**
 * Ooglee-blog configuration settings
 */
return array(

	/**
	 * The Post configuration when listing resource
	 */
	'post_index' => array(
		/**
		 * The index page to use for listing resource
		 * 
		 */
		'index' => 'ooglee-blog::site.post.index',
		/**
		 * The admin index page to use for listing resource
		 * 
		 */
		'index_admin' => 'ooglee-blog::admin.post.index',
		/**
		 * How many posts per page
		 */
    	'results_per_page' => 5,
	),

	/**
	 * The Post configuration when viewing resource
	 */
	'post_view' => array(
		/**
		 * The view page to use for showing resource
		 * 
		 */
		'view' => 'ooglee-blog::site.post.view',
	),

	/**
	 * The Post configuration when creating resource
	 */
	'post_create' => array(
		/**
		 * The view page to use for creating resource
		 * 
		 */
		'view' => 'ooglee-blog::admin.post.create',
	),

	/**
	 * The Post configuration when editing resource
	 */
	'post_edit' => array(
		/**
		 * The view page to use for editing resource
		 * 
		 */
		'view' => 'ooglee-blog::admin.post.edit',
	),

	/**
	 * The Post routes to use with our package
	 */
	'post_routes' => array(
		/**
		 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
		 * file then set this to false.
		 */
		'path_structure' => '{year}/{month}/{day}'
		/**
		 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
		 * file then set this to false.
		 */
	),

	/**
	 * The Post routes to use with our package
	 */
	'blog_routes' => array(
    	/**
		 * Base URI of the package's pages, e.g. "blog" in http://domain.com/blog and http://domain.com/blog/my-post
		 */
		'base_uri' => 'blog',
		/**
		 * Base URI of the package's pages, e.g. "blog" in http://domain.com/blog and http://domain.com/blog/my-post
		 */
		'base_uri_admin' => 'blog'
	),
);