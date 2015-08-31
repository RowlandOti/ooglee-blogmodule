<?php namespace Ooglee\Domain\Providers;

use Ooglee\Domain\Providers\LaravelServiceProvider;

class OogleeBlogServiceProvider extends LaravelServiceProvider {

	protected $packageVendor = 'rowland';

	protected $packageName = 'ooglee-blog';

	protected $packageDir = __DIR__;

	protected $packageNameCapitalized = 'Ooglee-blog';

	protected $packageConfigClass = 'Ooglee\Infrastructure\Config\OogleeBlogConfig';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		\App::register('Ooglee\Domain\Providers\RouteBlogServiceProvider');
		\App::register('Ooglee\Domain\Providers\EventBlogServiceProvider');
		\App::register('Ooglee\Domain\Providers\PostServiceProvider');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
 		parent::register();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
