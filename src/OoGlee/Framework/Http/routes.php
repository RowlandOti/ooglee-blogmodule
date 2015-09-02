<?php

// Application routes
Route::group(['namespace' => 'Application'], function()
{
    #POST MODEL	
	// List Resources
	Route::get(OogleeBConfig::get('config.blog_routes.base_uri'), ['as' => 'post.index', 'uses' => 'PostsController@getIndex']);
	// Show resource 
    Route::get(OogleeBConfig::get('config.blog_routes.base_uri').'/'.OogleeBConfig::get('config.post_routes.path_structure').'/{id}', ['as' => 'post.view', 'uses' => 'PostsController@getShow']);
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::group(['middleware' => 'auth'], function() 
    {
    	#POST MODEL
        // List Resources
        Route::get(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post', ['as' => 'admin.post.index', 'uses' => 'PostsController@getIndex']);
    	// Create Resource GET/POST
        Route::get(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/create', ['as' => 'admin.post.create', 'uses' => 'PostsController@getCreate']);
        Route::post(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/create', ['as' => 'admin.post.create', 'uses' => 'PostsController@postCreate']);
        // Edit resource GET/POST
		Route::get(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@getEdit']);
		Route::post(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@postEdit']);
        // Delete resource
		Route::get(OogleeBConfig::get('config.post_routes.base_uri_admin').'/post/delete/{id}', ['as' => 'admin.post.delete', 'uses' => 'PostsController@postDelete']);
    });
});
