<? php

// Application routes
Route::group(['namespace' => 'Application'], function()
{
    #POST MODEL	
	// List Resources
	Route::get(Config::get('laravelblog::routes.base_uri'), 'Ooglee\Framework\Http\Controllers\Application\PostsController@getIndex');
	// Show resource 
	Route::get(Config::get('laravelblog::routes.base_uri').'/{id}', 'Ooglee\Framework\Http\Controllers\Application\PostsController@getShow');
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::group(['middleware' => 'auth'], function() 
    {
    	#POST MODEL
        // List Resources
        Route::get(Config::get('laravelblog::routes.base_uri').'/post', ['as' => 'admin.post.index', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@getIndex']);
    	// Create Resource GET/POST
        Route::get(Config::get('laravelblog::routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@getCreate']);
        Route::post(Config::get('laravelblog::routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@postCreate']);
        // Edit resource GET/POST
		Route::get(Config::get('laravelblog::routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@getEdit']);
		Route::post(Config::get('laravelblog::routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@postEdit']);
        // Delete resource
		Route::get(Config::get('laravelblog::routes.base_uri').'/post/{id}/delete', ['as' => 'admin.post.delete', 'uses' => 'Ooglee\Framework\Http\Controllers\Admin\PostsController@postDelete']);
    });
});
