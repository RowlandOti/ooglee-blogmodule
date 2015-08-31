<?php

// Application routes
Route::group(['namespace' => 'Application'], function()
{
    #POST MODEL	
	// List Resources
    Route::get('blog', 'PostsController@getIndex');
	//Route::get(Config::get('config.post_routes.base_uri'), 'Application\PostsController@getIndex');
	// Show resource 
	Route::get(Config::get('config.post_routes.base_uri').'/{id}', 'PostsController@getShow');
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::group(['middleware' => 'auth'], function() 
    {
    	#POST MODEL
        // List Resources
        Route::get(Config::get('config.post_routes.base_uri').'/post', ['as' => 'admin.post.index', 'uses' => 'PostsController@getIndex']);
    	// Create Resource GET/POST
        Route::get(Config::get('config.post_routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'PostsController@getCreate']);
        Route::post(Config::get('config.post_routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'PostsController@postCreate']);
        // Edit resource GET/POST
		Route::get(Config::get('config.post_routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'PostsController@getEdit']);
		Route::post(Config::get('config.post_routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'PostsController@postEdit']);
        // Delete resource
		Route::get(Config::get('config.post_routes.base_uri').'/post/{id}/delete', ['as' => 'admin.post.delete', 'uses' => 'PostsController@postDelete']);
    });
});
