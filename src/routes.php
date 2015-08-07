<?php
// Main default listing e.g. http://domain.com/blog

Route::get(Config::get('laravelblog::routes.base_uri'), 'Rowland\LaravelBlog\PostsController@index');

// Blog post detail page e.g. http://domain.com/blog/my-post
Route::get(Config::get('laravelblog::routes.base_uri').'/{slug}', 'Rowland\LaravelBlog\PostsController@view');

// RSS feed URL e.g. http://domain.com/blog.rss
Route::get(Config::get('laravel-blog::routes.base_uri').'.rss', 'Rowland\LaravelBlog\PostsController@rss');